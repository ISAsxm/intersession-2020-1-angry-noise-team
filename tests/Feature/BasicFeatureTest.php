<?php

use Tests\TestCase;

class BasicFeatureTest extends TestCase
{
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
