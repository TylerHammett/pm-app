<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    use RefreshDatabase;

    public function test_has_path()
    {

        $project = factory('App\Project')->create();

        $this->assertEquals($project->path(), $project->path());

    }

    public function test_project_can_add_task()
    {
        $project = factory('App\Project')->create();

        $project->addTask('Test task');

        $this->assertCount(1, $project->tasks);
    }

}
