<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    private const ROLE_LABELS = [
        'admin' => 'Administrator',
        'editor' => 'Editor',
        'writer' => 'Penulis',
        'reader' => 'Pembaca',
    ];

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'role' => ['nullable', Rule::in(array_keys(self::ROLE_LABELS))],
            'status' => ['nullable', Rule::in(['active', 'inactive'])],
        ]);

        $search = trim($validated['search'] ?? '');
        $users = User::query()
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when(
                $validated['role'] ?? null,
                fn ($query, string $role) => $query->where('role', $role)
            )
            ->when(
                $validated['status'] ?? null,
                fn ($query, string $status) => $query->where('is_active', $status === 'active')
            )
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('admin.users.index', [
            'users' => $users,
            'search' => $search,
            'selectedRole' => $validated['role'] ?? '',
            'selectedStatus' => $validated['status'] ?? '',
            'roleLabels' => self::ROLE_LABELS,
            'totalUsers' => User::count(),
            'activeUsers' => User::where('is_active', true)->count(),
            'inactiveUsers' => User::where('is_active', false)->count(),
        ]);
    }

    public function create(): View
    {
        return view('admin.users.form', [
            'user' => new User,
            'roleLabels' => self::ROLE_LABELS,
            'isEditing' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $validated['is_active'] = true;

        User::query()->create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Akun pengguna berhasil dibuat.');
    }

    public function edit(User $user): View
    {
        return view('admin.users.form', [
            'user' => $user,
            'roleLabels' => self::ROLE_LABELS,
            'isEditing' => true,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate($this->rules($user));

        if ($user->is($request->user()) && $validated['role'] !== 'admin') {
            return back()
                ->withErrors(['role' => 'Peran akun yang sedang digunakan tidak dapat diubah.'])
                ->withInput();
        }

        return DB::transaction(function () use ($validated, $user): RedirectResponse {
            if (
                $user->is_active
                && $user->role === 'admin'
                && $validated['role'] !== 'admin'
                && User::query()
                    ->where('role', 'admin')
                    ->where('is_active', true)
                    ->lockForUpdate()
                    ->count() <= 1
            ) {
                return back()
                    ->withErrors(['role' => 'Peran admin terakhir yang aktif tidak dapat diubah.'])
                    ->withInput();
            }

            if (empty($validated['password'])) {
                unset($validated['password']);
            }

            $user->update($validated);

            return redirect()->route('admin.users.index')
                ->with('success', 'Informasi akun pengguna berhasil diperbarui.');
        });
    }

    public function toggleStatus(Request $request, User $user): RedirectResponse
    {
        abort_if($user->is($request->user()), 403);

        return DB::transaction(function () use ($user): RedirectResponse {
            if (
                $user->is_active
                && $user->role === 'admin'
                && User::query()
                    ->where('role', 'admin')
                    ->where('is_active', true)
                    ->lockForUpdate()
                    ->count() <= 1
            ) {
                return back()->with('error', 'Admin aktif terakhir tidak dapat dinonaktifkan.');
            }

            $user->is_active = ! $user->is_active;
            $user->save();

            return back()->with(
                'success',
                $user->is_active
                    ? 'Akun pengguna berhasil diaktifkan kembali.'
                    : 'Akun pengguna berhasil dinonaktifkan. Artikel miliknya tetap tersimpan.'
            );
        });
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        abort_if($user->is($request->user()), 403, 'Tidak dapat menghapus akun Anda sendiri.');

        return DB::transaction(function () use ($user): RedirectResponse {
            if (
                $user->role === 'admin'
                && User::query()
                    ->where('role', 'admin')
                    ->where('is_active', true)
                    ->lockForUpdate()
                    ->count() <= 1
            ) {
                return back()->with('error', 'Admin aktif terakhir tidak dapat dihapus.');
            }

            $user->delete();

            return redirect()->route('admin.users.index')
                ->with('success', 'Akun pengguna berhasil dihapus.');
        });
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    private function rules(?User $user = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'alpha_dash',
                'min:3',
                'max:30',
                Rule::unique('users', 'username')->ignore($user),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user),
            ],
            'role' => ['required', Rule::in(array_keys(self::ROLE_LABELS))],
            'pen_name' => ['nullable', 'string', 'max:150'],
            'whatsapp' => ['nullable', 'string', 'max:30'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'password' => [
                $user ? 'nullable' : 'required',
                'confirmed',
                Password::min(8),
            ],
        ];
    }
}
