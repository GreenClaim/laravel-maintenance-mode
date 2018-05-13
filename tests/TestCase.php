<?php

namespace Konsulting\Laravel\MaintenanceMode\Tests;


use Konsulting\Laravel\MaintenanceMode\MaintenanceModeProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders($app)
    {
        return [MaintenanceModeProvider::class];
    }

    /**
     * Boot the testing helper traits.
     *
     * @return array
     */
    protected function setUpTraits()
    {
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshStorageDirectory::class])) {
            $this->refreshStorageDirectory();
        }

        return parent::setUpTraits();
    }
}
