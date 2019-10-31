@extends('layouts.app')

@section('content')

    <div class="row mt-8">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <div class="row">
                <div class="col-lg-6">
                    <!-- Title -->
                    <h6 class="text-muted"><a href="/projects">My Projects</a> / <a href="/projects/{{ $project->id }}/edit">
                            {{ $project->title }}</a></h6>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <button type="button" class="btn-primary btn btn-block" data-toggle="modal"
                       data-target="#taskModal">Add Task</button>
                </div>

            </div>

            <!-- Post Content -->
            <h6 class="text-muted mt-5 ">Tasks</h6>
            <div class="task-container">
                @foreach($project->tasks as $task)
                    <div id="task{{ $task->id }}" class="task-row task-card card mb-3 shadow mt-3">
                        <form class="row" action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input class="task-body w-100 col-md-10" name="body" value="{{ $task->body }}">
                            <i class="far fa-circle icon col-md-1"></i>
                            <i url="{{route('tasks.destroy', [$project->id, $task->id])}}" task-id="{{ $task->id }}"
                                   class="far fa-trash-alt delete-icon col-md-1"></i>
                        </form>
                    </div>
                @endforeach
                    <div class="task-row task-card card mb-3 shadow mt-3">
                        <form class="row" action="/projects/{{ $project->id }}/tasks/" method="POST">
                            @csrf
                            <input class="task-body w-100 col-md-10" name="body" placeholder="Begin adding tasks...">
                        </form>
                    </div>
            </div>

            <!-- Notes -->
            <h6 class="text-muted mt-5">General Notes</h6>
            <div class="form-group notes">
                <form action="/projects/{{ $project->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <textarea name="notes" class="form-control" rows="5" >{{ $project->notes }}</textarea>
                    <button class="btn btn-primary mt-3">Add Notes</button>
                </form>
            </div>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4">
             <div class="mb-5 projects">
                 <div class="card h-100">
                     <div class="card-body shadow">
                         <h5 class="text-muted card-title pb-2 pt-4"><a href="/projects/{{ $project->id }}/edit">
                                 {{ $project->title }}</a></h5>
                         <p class="card-text">{{ $project->description }}</p>
                     </div>
                 </div>
             </div>
        </div>

    </div>
    <!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title text-muted" id="taskModalLabel">Add a task</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/projects/{{ $project->id }}/tasks" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="taskBody"
                                   name="body" placeholder="Task body" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Task</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
