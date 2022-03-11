<?php

namespace Managemize\LaravelFingerprints;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Managemize\LaravelFingerprints\Skeleton\SkeletonClass
 */
class LaravelFingerprintsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-fingerprints';
    }
}
