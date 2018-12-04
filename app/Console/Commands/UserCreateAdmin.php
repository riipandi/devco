<?php

namespace App\Console\Commands;

use App\User;
use Avatar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UserCreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:createadmin {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create administrator user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $usermail = $this->option('email');
        $userpass = $this->option('password');

        if (!$usermail or !$userpass) {
            $this->error(PHP_EOL.'Please identify user by email and specify new password!');
            exit;
        }

        if (User::where('username', '=', 'admin')->exists()) {
            $this->error(PHP_EOL.'Administrator user already exists!');
            exit;
        } else {
            $user_avatar = md5($usermail).'.png';
            $user = User::create([
                'username'       => 'admin',
                'name'           => 'Admin Sistem',
                'email'          => $usermail,
                'password'       => $userpass,
                'avatar'         => $user_avatar,
                'remember_token' => str_random(40),
            ]);

            // Generate user avatar
            $avatar_file = Avatar::create('Admin Sistem')->getImageObject()->encode('png');
            Storage::disk('public')->put('avatars/'.$user_avatar, (string) $avatar_file);

            // Force verify created user
            $user->email_verified_at = now();
            $user->save();

            $user->assignRole('superadmin');

            $this->info(PHP_EOL.'User administrator created successfully.'.PHP_EOL);

            $this->call('passport:install', ['--force']);
        }
    }
}
