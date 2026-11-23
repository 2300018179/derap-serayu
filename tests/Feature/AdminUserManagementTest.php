<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminUserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_user_account_with_an_assigned_role(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('admin.users.create'))
            ->assertOk()
            ->assertSee('Tambah Pengguna')
            ->assertSee('Administrator')
            ->assertSee('Pembaca');

        $this->post(route('admin.users.store'), [
            'name' => 'Editor Baru',
            'username' => 'editorbaru',
            'email' => 'editorbaru@example.com',
            'role' => 'editor',
            'pen_name' => 'Redaksi Baru',
            'password' => 'EditorPassword123!',
            'password_confirmation' => 'EditorPassword123!',
        ])
            ->assertRedirect(route('admin.users.index'));

        $user = User::query()->where('username', 'editorbaru')->firstOrFail();

        $this->assertSame('editor', $user->role);
        $this->assertTrue($user->is_active);
        $this->assertTrue(Hash::check('EditorPassword123!', $user->password));
    }

    public function test_admin_can_search_and_filter_user_accounts(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $writer = User::factory()->create([
            'name' => 'Penulis Serayu',
            'role' => 'writer',
            'is_active' => true,
        ]);
        User::factory()->create([
            'name' => 'Pembaca Serayu',
            'role' => 'reader',
            'is_active' => false,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.users.index', [
                'search' => 'Penulis',
                'role' => 'writer',
                'status' => 'active',
            ]))
            ->assertOk()
            ->assertSee($writer->email)
            ->assertDontSee('Pembaca Serayu')
            ->assertViewHas('totalUsers', 3)
            ->assertViewHas('activeUsers', 2)
            ->assertViewHas('inactiveUsers', 1);
    }

    public function test_admin_can_update_user_role_and_keep_password_when_no_new_password_is_given(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create([
            'role' => 'reader',
            'password' => 'OriginalPassword123!',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.users.edit', $user))
            ->assertOk()
            ->assertSee('Ubah Akun Pengguna')
            ->assertSee($user->email);

        $this->put(route('admin.users.update', $user), [
            'name' => $user->name,
            'username' => 'updated'.substr((string) $user->id, -10),
            'email' => $user->email,
            'role' => 'writer',
            'pen_name' => 'Penulis Baru',
            'whatsapp' => '',
            'bio' => '',
            'password' => '',
            'password_confirmation' => '',
        ])
            ->assertRedirect(route('admin.users.index'));

        $user->refresh();
        $this->assertSame('writer', $user->role);
        $this->assertSame('Penulis Baru', $user->pen_name);
        $this->assertTrue(Hash::check('OriginalPassword123!', $user->password));
    }

    public function test_admin_can_deactivate_user_without_removing_authored_articles_and_reactivate_them(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $writer->articles()->create([
            'title' => 'Artikel tetap tersimpan',
            'slug' => 'artikel-tetap-tersimpan',
            'summary' => 'Artikel tetap tersedia setelah akun dinonaktifkan.',
            'category' => 'Berita',
            'status' => 'published',
            'author_name' => $writer->name,
            'content' => '<p>Isi artikel.</p>',
        ]);

        $this->actingAs($admin)
            ->patch(route('admin.users.status', $writer))
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['id' => $writer->id, 'is_active' => false]);
        $this->assertModelExists($article);

        $this->patch(route('admin.users.status', $writer))
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['id' => $writer->id, 'is_active' => true]);
        $this->assertModelExists($article);
    }

    public function test_admin_cannot_deactivate_their_own_account_or_change_its_role(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->patch(route('admin.users.status', $admin))
            ->assertForbidden();

        $this->put(route('admin.users.update', $admin), [
            'name' => $admin->name,
            'username' => $admin->username ?? 'adminuser',
            'email' => $admin->email,
            'role' => 'writer',
            'password' => '',
            'password_confirmation' => '',
        ])->assertSessionHasErrors('role');

        $this->assertDatabaseHas('users', ['id' => $admin->id, 'role' => 'admin', 'is_active' => true]);
    }

    public function test_inactive_accounts_cannot_log_in(): void
    {
        $user = User::factory()->create([
            'role' => 'writer',
            'username' => 'inactivewriter',
            'password' => 'WriterPassword123!',
            'is_active' => false,
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'login' => $user->username,
            'password' => 'WriterPassword123!',
        ])->assertRedirect(route('login'))
            ->assertSessionHasErrors('login');
    }

    public function test_deactivated_account_is_logged_out_on_its_next_request(): void
    {
        $user = User::factory()->create(['role' => 'writer']);
        $user->update(['is_active' => false]);

        $this->actingAs($user->fresh())
            ->get(route('home'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_admin_user_listing_escapes_user_provided_names(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->create([
            'name' => '<script>alert("xss")</script>',
            'role' => 'reader',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.users.index'))
            ->assertOk()
            ->assertSee('<script>alert("xss")</script>')
            ->assertDontSee('<script>alert("xss")</script>', false);
    }

    public function test_non_admin_cannot_manage_user_accounts(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $user = User::factory()->create(['role' => 'reader']);

        $this->actingAs($writer)
            ->get(route('admin.users.index'))
            ->assertForbidden();

        $this->patch(route('admin.users.status', $user))
            ->assertForbidden();
    }

    public function test_admin_dashboard_links_to_account_management_and_shows_account_count(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->create(['role' => 'writer']);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertViewIs('admin.dashboard')
            ->assertViewHas('totalPengguna', 2)
            ->assertSee(route('admin.users.index'))
            ->assertSee('Kelola Pengguna');
    }
}
