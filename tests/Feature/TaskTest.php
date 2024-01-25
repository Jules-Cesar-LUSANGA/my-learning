<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_can_get_all_tasks(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function test_can_create_task() : void
    {
        $data = [
            // 'title' => 'My title',
            // // 'category_id' => 2,
            // 'description'   => 'Hello world'
        ];

        $response = $this->post('/tasks', ['data' => $data]);

        $response->assertStatus(302);
    }

    public function test_can_update_task() : void
    {
        $task = Task::factory()->create();

        $data = [
            'title' => 'New title'
        ];

        $response = $this->put("/tasks/{$task->id}", ['data' => $data]);

        $response->assertStatus(302);
    }
}
