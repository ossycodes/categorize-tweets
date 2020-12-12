<?php

namespace Tests\Feature;

use Tests\TestCase;

class CoverageTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_access_coverage_index_method()
    {
        $response = $this->get('api/coverage');

        $response->assertStatus(200);

        $response->assertJson([
            'status' => 'ok',
        ]);
    }
}
