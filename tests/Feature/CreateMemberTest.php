<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Member as Member;


class CreateMemberTest extends TestCase
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
            ->postJson('api/members', factory(Member::class)->raw());

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => 'true',
            ]);

    }
}
