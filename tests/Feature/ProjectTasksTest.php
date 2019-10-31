<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_can_have_tasks()
    {

        $user = (factory('App\User')->create());

        Auth::login($user);

        $project = factory(Project::class)->create(['owner_id' => $user->id]);

        $this->post($project->path() . '/tasks', ['body' => 'test task']);

        $this->get($project->path())->assertSee('test task');
    }

    public function test_only_project_owner_can_add_tasks()
    {
        $user = (factory('App\User')->create());

        Auth::login($user);

        $project = factory(Project::class)->create();

        $this->post($project->path() . '/tasks/', ['body' => 'Test'])
            ->assertStatus(403);

    }

}
