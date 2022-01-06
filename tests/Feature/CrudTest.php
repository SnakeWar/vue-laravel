<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function create_todoData_isCorrect()
    {
        $response = $this->post('/api/todos',[
            'name' => 'teste unit',
            'date' => '2022-01-06'
        ],[

        ])
            ->assertStatus(200);
    }
    public function update_todoData_isCorrect()
    {
        $response = $this->post('/api/todos/28',[
            'name' => 'teste unit edit',
            'date' => '2022-01-06'
        ])->assertStatus(200);
    }
}
