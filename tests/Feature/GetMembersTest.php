<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetMembersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this
            ->withHeader('X-Requested-With', 'XMLHttpRequest')
            ->get( 'api/event_members/1');

        $response->assertStatus(200);
    }
}
