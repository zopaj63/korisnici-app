<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AgeCheckTest extends TestCase
{
    public function testMladiOd18()
    {
        $response=$this->get("/welcome?age=10");
        $response->assertRedirect("/under18");
    }

    public function testStarijiOd18()
    {
        $response=$this->get("/welcome?age=30");
        $response->assertSee("Dobrodošli!");
    }
}
