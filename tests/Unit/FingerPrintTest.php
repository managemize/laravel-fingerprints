<?php
namespace Managemize\LaravelFingerprints\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;

class FingerPrintTest extends \Managemize\LaravelFingerprints\Tests\TestCase
{
    use RefreshDatabase;

    function test_finger_print() {
        $this->assertStatus(200);
    }
}