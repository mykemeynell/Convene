<?php

use Illuminate\Database\Seeder;

class ApplicationSettingSeeder extends Seeder
{
    /**
     * System settings.
     *
     * @var array
     */
    protected $settings = [
        [
            'key' => 'auth_user_default_view',
            'value' => 'spaces',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
