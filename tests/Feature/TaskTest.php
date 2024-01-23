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
        $task = Task::factory()->create();

        $response = $this->post('/tasks', ['task' => $task]);

        $response->assertRedirectToRoute('tasks.show', $task->id);

        $response->assertStatus(302);
    }
}
