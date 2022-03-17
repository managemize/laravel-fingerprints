<?php
namespace Managemize\LaravelFingerprints\Tests\Database\Seeders;

use Illuminate\Database\Seeder;
use Managemize\LaravelFingerprints\Tests\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
    }
}
