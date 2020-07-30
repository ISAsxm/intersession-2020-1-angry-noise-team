<?php

use Tests\TestCase;

/**
 * @internal
 */
class BasicFeatureTest extends TestCase
{
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
