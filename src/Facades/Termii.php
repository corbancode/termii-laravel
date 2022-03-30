<?php

namespace Corbancode\TermiiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Termii extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'termii';
    }
}
