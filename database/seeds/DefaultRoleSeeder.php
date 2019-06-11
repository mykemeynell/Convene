<?php

use Illuminate\Database\Seeder;

class DefaultRoleSeeder extends Seeder
{
    /**
     * Default roles.
     *
     * @var array
     */
    protected $roles = [
        [
            'name' => 'System Administrator',
            'description' => 'Highest administrator level, can access all areas and administer the application',
        ],
        [
            'name' => 'Administrator',
            'description' => 'Can administer users, and spaces, but cannot alter the properties and settings of the application',
        ],
        [
            'name' => 'User',
            'description' => 'Can create and edit spaces and pages',
        ],
        [
            'name' => 'Consumer',
            'description' => 'Akin to read-only access, cannot modify any content. Only has access to areas that are public ' .
                'or that spaces that they have been granted access to explicitly.',
        ],
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
