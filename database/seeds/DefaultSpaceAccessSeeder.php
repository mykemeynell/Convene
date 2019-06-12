<?php

use Illuminate\Database\Seeder;
use Symfony\Component\HttpFoundation\ParameterBag;

class DefaultSpaceAccessSeeder extends Seeder
{
    /**
     * Default access levels for spaces.
     *
     * @var array
     */
    protected $access = [
        [
            'name' => 'Open',
            'description' => 'Anybody can access this space, including external (non-authenticated users).',
            'slug' => 'open',
            'icon' => 'fas fa-globe fa-fw',
        ],
        [
            'name' => 'Internal',
            'description' => 'Anybody that has been authenticated can access this space.',
            'slug' => 'internal',
            'icon' => 'fas fa-building fa-fw',
        ],
        [
            'name' => 'Private',
            'description' => 'Only those that have been added, or have an invite to this space can see it',
            'slug' => 'private',
            'icon' => 'fas fa-shield-alt fa-fw',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var \Convene\Storage\Service\SpaceAccessService $service */
        $service = app('spaceAccess.service');

        foreach((array) $this->access as $level) {
            $service->create(new ParameterBag($level));
        }
    }
}
