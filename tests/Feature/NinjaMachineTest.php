<?php

namespace Tests\Feature;

use Tests\TestCase;

class NinjaMachineTest extends TestCase
{
    public function test_ninja_balance(): void
    {
        $response = $this->get('/testar-ninja?tape=TNG');

        $response->assertJsonPath('status', 'ACCEPT');
    }
}
