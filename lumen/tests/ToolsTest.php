<?php

// use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ToolsTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate() {
        $this->disableExceptionHandling();

        $tool = factory('App\Tools') -> raw();
        
        $response = $this->json('POST', '/tools', $tool)
            ->seeJson($tool)
            ->assertResponseStatus(201);
    }

    public function testList() { 
        $this->disableExceptionHandling();
        $tool = factory('App\Tools', 3) -> create();

        $this->get('/tools', []);
        $this->seeStatusCode(200);
    }

    public function testDelete() {
        $this->disableExceptionHandling();
        $tool = factory('App\Tools') -> create();

        $this->delete("/tools/{$tool['id']}", []);
        $this->seeStatusCode(204);
    }
}
