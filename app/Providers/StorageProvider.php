<?php

namespace Convene\Providers;

use Convene\Providers\Concern\AliasService;
use Illuminate\Support\ServiceProvider;

/**
 * Class StorageProvider.
 *
 * @package Convene\Providers
 */
class StorageProvider extends ServiceProvider
{
    use AliasService;

    /**
     * The services aliases, we need to update the provides array to.
     *
     * @var array
     */
    protected $aliases = [
        'user.entity'       => [\Convene\Storage\Entity\Contract\UserEntityInterface::class],
        'user.repository'   => [\Convene\Storage\Repository\Contract\UserRepositoryInterface::class],
        'user.service'      => [\Convene\Storage\Service\Contract\UserServiceInterface::class],

        'userRole.entity'  => [\Convene\Storage\Entity\Contract\UserRoleEntityInterface::class],
        'userRole.repository' => [\Convene\Storage\Repository\Contract\UserRoleRepositoryInterface::class],
        'userRole.service' => [\Convene\Storage\Service\Contract\UserRoleServiceInterface::class],
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerAliases();
        $this->registerEntities();
        $this->registerRepositories();
        $this->registerServices();
    }

    /**
     * Register the package entities.
     *
     * @return void
     */
    protected function registerEntities(): void
    {
        $this->app->bind('user.entity', \Convene\Storage\Entity\UserEntity::class);
        $this->app->bind('userRole.entity', \Convene\Storage\Entity\UserRoleEntity::class);
    }

    /**
     * Register the package repositories.
     *
     * @return void
     */
    protected function registerRepositories(): void
    {
         $this->app->singleton('user.repository', \Convene\Storage\Repository\UserRepository::class);
         $this->app->singleton('userRole.repository', \Convene\Storage\Repository\UserRoleRepository::class);
    }

    /**
     * Register the package services.
     *
     * @return void
     */
    protected function registerServices(): void
    {
         $this->app->singleton('user.service', \Convene\Storage\Service\UserService::class);
         $this->app->singleton('userRole.service', \Convene\Storage\Service\UserRoleService::class);
    }
}
