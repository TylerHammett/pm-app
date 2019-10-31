@extends('layouts.app')


@section('content')

    <div class="row mt-8">
        <div class="col-sm-2">
            <h4 class="text-muted">My Projects</h4>
        </div>
        <div class="col-sm-8"></div>
        <div class="col-sm-2">
            <a href="/projects/create" class="btn btn-block btn-primary">Add Project</a>
        </div>
    </div>

    <div class="row mt-4">
        @foreach($projects as $project)
            <div class="col-md-4 mb-5 projects">
                <div class="card h-100">
                    <div class="card-body shadow">
                        <h4 class="card-title pb-2 pt-4"><a href="{{ $project->path() }}">{{ $project->title }}</a></h4>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach

            @if($projects->isEmpty())
                <div class="col-md-4 mb-5 projects">
                    <div class="card h-100">
                        <div class="card-body shadow">
                            <h4 class="card-title pb-2 pt-4">Looks like your all done!</h4>
                            <p class="card-text">Create a new project to get started.</p>
                        </div>
                    </div>
                </div>
            @endempty
    </div>
    <!-- /.row -->


@endsection
