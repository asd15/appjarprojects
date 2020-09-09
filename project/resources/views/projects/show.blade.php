@extends('layouts.layout')
@section('content')

            <div class="wrapper project-details">
                <h1>Project - {{ $project->name }}</h1>
                <h2>Type - {{ $project->type }}</h2>
            </div>
            <div class="wrapper">
                <h3>Requirements</h3>
                <ul>
                @foreach($project->requirements as $requirement)
                    <li>{{ $requirement }}</li>
                @endforeach
                </ul>

                <form action="{{ url('/emails') }}/{{ $project->id }}" method="POST">
                    @csrf
                    <button>Accept Project</button>
                </form>

            <form action="{{ url('/projects') }}/{{ $project->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Reject Project</button>

            </form>
                <a href="{{ url('/projects') }}">Back to all Projects</a>
            </div>
@endsection
