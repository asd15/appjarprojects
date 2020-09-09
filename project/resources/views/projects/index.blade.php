@extends('layouts.layout')
@section('content')

    <div class="wrapper project-index">
        <h1>Projects</h1>
    </div>
    <div class="wrapper">
    @foreach($projects as $project)
        <div class="project-item">
            <h4><a href="{{ url('/projects') }}/{{ $project->id }}">{{ $project->name }} - {{ $project->type }}</a></h4>
        </div>
        @endforeach
    </div>
</div>
@endsection
