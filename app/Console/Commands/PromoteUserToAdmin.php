<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PromoteUserToAdmin extends Command
{
    protected $signature = 'users:make-admin {email : Email address of the existing account}';

    protected $description = 'Grant administrator access to an existing account';

    public function handle(): int
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (! $user) {
            $this->error('No account exists with that email address.');

            return self::FAILURE;
        }

        $user->update(['role' => 'admin']);
        $this->info("Administrator access granted to {$user->email}.");

        return self::SUCCESS;
    }
}
