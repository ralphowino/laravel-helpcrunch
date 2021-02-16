<?php

namespace Ralphowino\HelpCrunch;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ralphowino\HelpCrunch\Commands\HelpCrunchCommand;

class HelpCrunchServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('helpcrunch')->hasConfigFile();
    }
}
