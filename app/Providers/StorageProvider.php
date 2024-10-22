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

        'spaceAccess.entity'  => [\Convene\Storage\Entity\Contract\SpaceAccessEntityInterface::class],
        'spaceAccess.repository' => [\Convene\Storage\Repository\Contract\SpaceAccessRepositoryInterface::class],
        'spaceAccess.service' => [\Convene\Storage\Service\Contract\SpaceAccessServiceInterface::class],

        'space.entity'  => [\Convene\Storage\Entity\Contract\SpaceEntityInterface::class],
        'space.repository' => [\Convene\Storage\Repository\Contract\SpaceRepositoryInterface::class],
        'space.service' => [\Convene\Storage\Service\Contract\SpaceServiceInterface::class],

        'page.entity'  => [\Convene\Storage\Entity\Contract\PageEntityInterface::class],
        'page.repository' => [\Convene\Storage\Repository\Contract\PageRepositoryInterface::class],
        'page.service' => [\Convene\Storage\Service\Contract\PageServiceInterface::class],

        'folder.entity'  => [\Convene\Storage\Entity\Contract\FolderEntityInterface::class],
        'folder.repository' => [\Convene\Storage\Repository\Contract\FolderRepositoryInterface::class],
        'folder.service' => [\Convene\Storage\Service\Contract\FolderServiceInterface::class],
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
        $this->app->bind('spaceAccess.entity', \Convene\Storage\Entity\SpaceAccessEntity::class);
        $this->app->bind('space.entity', \Convene\Storage\Entity\SpaceEntity::class);
        $this->app->bind('page.entity', \Convene\Storage\Entity\PageEntity::class);
        $this->app->bind('folder.entity', \Convene\Storage\Entity\FolderEntity::class);
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
         $this->app->singleton('spaceAccess.repository', \Convene\Storage\Repository\SpaceAccessRepository::class);
         $this->app->singleton('space.repository', \Convene\Storage\Repository\SpaceRepository::class);
         $this->app->singleton('page.repository', \Convene\Storage\Repository\PageRepository::class);
         $this->app->singleton('folder.repository', \Convene\Storage\Repository\FolderRepository::class);
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
         $this->app->singleton('spaceAccess.service', \Convene\Storage\Service\SpaceAccessService::class);
         $this->app->singleton('space.service', \Convene\Storage\Service\SpaceService::class);
         $this->app->singleton('page.service', \Convene\Storage\Service\PageService::class);
         $this->app->singleton('folder.service', \Convene\Storage\Service\FolderService::class);
    }
}
