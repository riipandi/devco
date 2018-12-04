<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 10)->create()->each(function ($u) {

            $verified = [now(), null];

            $roles = [
                'administrator',
                'subscriber',
            ];

            // Save new attributes
            $u->email_verified_at = $verified[array_rand($verified)];
            $u->save();

            // Asign the role
            $u->assignRole($roles[array_rand($roles)]);
        });
    }
}
