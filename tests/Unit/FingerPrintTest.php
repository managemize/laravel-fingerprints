<?php

namespace Managemize\LaravelFingerprints\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Managemize\LaravelFingerprints\Tests\Models\User;

class FingerPrintTest extends \Managemize\LaravelFingerprints\Tests\TestCase
{

    use RefreshDatabase, WithFaker;

    function test_finger_print()
    {
        $this->be(User::find(1))
        ->assertDatabaseCount('users', 2)
        ->assertTrue(Schema::hasColumn('users', 'created_by')
            && Schema::hasColumn('users', 'updated_by')
            && Schema::hasColumn('users', 'deleted_by'));

        User::factory(1)->create();

        $user = User::find(2);
        $user->name = $this->faker->name();
        $user->save();
        $user->delete();
        
        $this->assertDatabaseHas('users', ['created_by' => 1]);
        $this->assertDatabaseHas('users', ['updated_by' => 1]);
        $this->assertDatabaseHas('users', ['deleted_by' => 1]);
    }
}