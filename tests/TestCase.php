<?php

namespace Managemize\LaravelFingerprints\Tests;


use Managemize\LaravelFingerprints\LaravelFingerprintsServiceProvider;
use Managemize\LaravelFingerprints\Providers\BlueprintMacroServiceProvider;
use Managemize\LaravelFingerprints\Tests\Database\Seeders\DatabaseSeeder;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        $this->artisan('migrate', ['--database' => 'testbench'])->run();
        $this->artisan('db:seed', ['--class' => DatabaseSeeder::class])->run();
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelFingerprintsServiceProvider::class,
            BlueprintMacroServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}