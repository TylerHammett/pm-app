@extends('layouts.app')

@section('content')

    <h1 class="text-center mt-7 mb-4">Edit {{ $project->title }}</h1>
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3 mb-5">
            <form action="/projects/{{ $project->id }}" method="post">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="proj-title" class="text-muted">Title</label>
                    <input class="form-control" type="text" name="title" id="proj-title" value="{{ $project->title }}" aria-label="project title" required>
                </div>
                <div class="form-group">
                    <label for="proj-description" class="text-muted">Description</label>
                    <textarea required class="form-control" name="description" id="proj-description" cols="30" rows="5">{{ $project->description }}</textarea>
                </div>

                <button class="btn btn-block btn-primary" type="submit">Edit Project</button>

            </form>
        </div>
    </div>

@endsection
