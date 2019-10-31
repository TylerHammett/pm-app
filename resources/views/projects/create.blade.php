@extends('layouts.app');

@section('content')

    <h1 class="text-center mt-6 mb-4">Create a Project</h1>
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3 mb-5">
            <form action="/projects" method="post">

                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="title" id="proj-title" placeholder="Project title" aria-label="project title" required>
                </div>
                <div class="form-group">
                    <textarea required class="form-control" name="description" id="proj-description" cols="30" rows="10" placeholder="Project Description"></textarea>
                </div>

                <button class="btn btn-block btn-primary" type="submit">Add Project</button>

            </form>
        </div>
    </div>

@endsection
