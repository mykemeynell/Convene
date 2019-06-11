<?php

namespace Convene\Providers\Concern;

/**
 * Trait AliasService.
 *
 * @property \Illuminate\Foundation\Application $app
 * @property array                              $aliases
 *
 * @package Convene\Providers\Concern
 */
trait AliasService
{
    /**
     * Register all aliases for this service provider.
     *
     * @return void
     */
    public function registerAliases(): void
    {
        foreach((array) $this->aliases as $key => $aliases) {
            foreach((array) $aliases as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        $provides = [];

        foreach($this->aliases as $alias => $providers) {
            $provides[] = $alias;
            foreach($providers as $provider) {
                $provides[] = $provider;
            }
        }

        return $provides;
    }
}

