<?php

namespace Tests\Feature\Http\Controllers\API;

use App\Models\User;
use Database\Factories\UserFactory;
use Tests\TestCase;

class ProxyControllerTest extends TestCase
{
    public function testExportRequestFail()
    {
        /**
         * @var User $user
         */
        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->post('/api/proxies/export', ['format' => 'ip@login'], ['accept' => 'application/json', 'Authorization' => "Bearer $token"]);

        $response->assertStatus(422);
    }

    public function testExport()
    {
        /**
         * @var User $user
         */
        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->post('/api/proxies/export', ['format' => 'ip'], ['accept' => 'application/json', 'Authorization' => "Bearer $token"]);

        $response->assertStatus(200);
    }
}
