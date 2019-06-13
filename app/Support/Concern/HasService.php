<?php

namespace Convene\Support\Concern;

use ArchLayer\Service\Contract\ServiceInterface;
use Illuminate\Support\Collection;

/**
 * Trait HasService
 *
 * @package Convene\Support\Concern
 */
trait HasService {

    /**
     * Holds the services that are used within the parent object.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $services;

    /**
     * Set a service within the object $services property.
     *
     * @param \ArchLayer\Service\Contract\ServiceInterface $service
     * @param string|null                                  $name
     *
     * @return Collection
     */
    protected function setService(ServiceInterface $service, ?string $name = null): Collection
    {
        if(! $this->services instanceof Collection) {
            $this->services = collect([]);
        }

        return $this->services->put(self::normalizeName($name), $service);
    }

    /**
     * Get a service that has been added into the parent object. A name can be specified if more than one
     * service has been registered.
     *
     * @param string|null $name
     *
     * @return \ArchLayer\Service\Contract\ServiceInterface
     */
    protected function getService(?string $name = null): ServiceInterface
    {
        return $this->services->get(self::normalizeName($name));
    }

    /**
     * Return a normalized string when getting or setting service by name.
     * Ensures that when a service is set, the string does not contain characters
     * that could cause unexpected or unwanted behaviour.
     *
     * @param string|null $name
     *
     * @return string
     */
    private static function normalizeName(?string $name = null): string
    {
        return ! empty($name)
            ? normalizer_normalize($name)
            : 'default';
    }
}
