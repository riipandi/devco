<?php

use Illuminate\Database\Seeder;
use Spatie\Valuestore\Valuestore;

class GlobalSettingSeeder extends Seeder
{
    public function run()
    {
        $default_settings = [
            'enable_twofactor'      => true,
            'enable_social_auth'    => true,

            'enable_auth_google'    => true,
            'oauth_google_client'   => null,
            'oauth_google_secret'   => null,

            'enable_auth_facebook'  => true,
            'oauth_facebook_client' => null,
            'oauth_facebook_secret' => null,

            'enable_auth_twitter'   => false,
            'oauth_twitter_client'  => null,
            'oauth_twitter_secret'  => null,

            'enable_auth_github'    => false,
            'oauth_github_client'   => null,
            'oauth_github_secret'   => null,

            'mail_driver'           => 'smtp',
            'mail_host'             => 'smtp.mailtrap.io',
            'mail_port'             => '2525',
            'mail_username'         => null,
            'mail_password'         => null,
            'mail_from_address'     => 'admin@localhost',
            'mail_from_name'        => 'Admin Sistem',
            'mail_encryption'       => 'tls',
        ];

        return Valuestore::make(storage_path('app/settings.json'), $default_settings);
    }
}
