<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ManageProjectsTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function test_user_can_create_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->get('/projects/create')->assertStatus(200);

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);

    }

    public function test_user_can_view_project()
    {

        $user = (factory('App\User')->create());

        Auth::login($user);

        $project = factory('App\Project')->create(['owner_id' => $user->id]);

        $this->get('/projects/' . $project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);

    }

    public function test_project_requires_title()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    public function test_project_requires_description()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    public function test_only_authenticated_users_can_create_projects()
    {

        $attributes = factory('App\Project')->raw();

        $this->post('/projects', $attributes)->assertRedirect('login');

    }

}
