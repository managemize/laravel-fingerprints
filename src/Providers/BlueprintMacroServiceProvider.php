<?php

namespace Managemize\LaravelFingerprints\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('userFingerPrints', macro: function () {
            /* @var \Illuminate\Database\Schema\Blueprint $this */
            $this->unsignedInteger(config('laravel-fingerprints.created_field', 'created_by'))->default(0);
            $this->unsignedInteger(config('laravel-fingerprints.updated_field', 'updated_by'))->default(0);
        });

        Blueprint::macro('userFingerPrintSoftDeletes', macro: function () {
            /* @var \Illuminate\Database\Schema\Blueprint $this */
            $this->unsignedInteger(config('laravel-fingerprints.deleted_field', 'deleted_by'))->default(0);
        });

        Blueprint::macro('fingerPrints', macro: function () {
            /* @var \Illuminate\Database\Schema\Blueprint $this */
            $this->timestamps();
            $this->softDeletes();
            $this->userFingerPrints();
            $this->userFingerPrintSoftDeletes();
        });

        Blueprint::macro('dropUserFingerPrints', macro: function () {
            /* @var \Illuminate\Database\Schema\Blueprint $this */
            $this->dropColumn(config('laravel-fingerprints.created_field', 'created_by'));
            $this->dropColumn(config('laravel-fingerprints.updated_field', 'updated_by'));
        });

        Blueprint::macro('dropUserFingerPrintSoftDeletes', macro: function () {
            /* @var \Illuminate\Database\Schema\Blueprint $this */
            $this->dropColumn(config('laravel-fingerprints.deleted_field', 'deleted_by'));
        });

        Blueprint::macro('dropFingerPrints', macro: function () {
            /* @var \Illuminate\Database\Schema\Blueprint $this */
            $this->timestamps();
            $this->softDeletes();
            $this->dropUserFingerPrints();
            $this->dropUserFingerPrintSoftDeletes();
        });
    }
}
