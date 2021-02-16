<?php

namespace Ralphowino\HelpCrunch;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ralphowino\HelpCrunch\HelpCrunch
 */
class HelpCrunchFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'helpcrunch';
    }
}
