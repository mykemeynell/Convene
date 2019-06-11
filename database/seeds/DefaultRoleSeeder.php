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
            'description' => '(System - Protected) Highest administrator level, can access all areas and administer the application',
        ],
        [
            'name' => 'Administrator',
            'description' => '(System - Protected) Can administer users, and spaces, but cannot alter the properties and settings of the application',
        ],
        [
            'name' => 'User',
            'description' => '(System - Protected) Can create and edit spaces and pages',
        ],
        [
            'name' => 'Consumer',
            'description' => '(System - Protected) Akin to read-only access, cannot modify any content. Only has access to areas that are public ' .
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
        /** @var \Convene\Storage\Service\UserService $service */
        $service = app('userRole.service');

        foreach((array) $this->roles as $role) {
            $service->create(new \Symfony\Component\HttpFoundation\ParameterBag($role));
        }
    }
}
