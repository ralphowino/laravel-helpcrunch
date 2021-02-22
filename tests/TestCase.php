<?php

namespace Ralphowino\HelpCrunch\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Ralphowino\HelpCrunch\HelpCrunch;
use Ralphowino\HelpCrunch\HelpCrunchServiceProvider;

class TestCase extends Orchestra
{
    /**
     * @var \Ralphowino\HelpCrunch\HelpCrunch
     */
    protected HelpCrunch $helpCrunch;

    public function setUp(): void
    {
        parent::setUp();
        $this->helpCrunch = new HelpCrunch();
    }

    protected function getPackageProviders($app)
    {
        return [
            HelpCrunchServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('services.helpcrunch.key', 'NjhiMjEzNmY2MzlkYmYxMzg4NjgyMDgy1uEdvlUSHyy7GpqSQIqqDn1RxS4c7CLIVZXdGGG/zn/P3jZMVT98eDGJzJ1SYxqX1bUvgSeV1uFA8YIUe6qZQBgmi+qTwWxyiAit4FqTHspQ37o8CvZB9oVJ+2cOE+/aGvJF3hjjFgtahk1Zz/yg4mKXAoMLMNIyQhGGAgX+fwgfZquubuADy6cmkOPR7SvO1978b6r2kAYrONv435e1m9FuHTZG7R5kmDQMllf5BG4Afb3KketfMO4M5k1Hfu4YgB3UYx+kBa2ziBeGuH3wCA==');
    }
}
