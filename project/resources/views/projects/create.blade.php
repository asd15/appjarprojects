@extends('layouts.layout')
@section('content')

    <div class="wrapper create-project">
        <h1>Add Project Details</h1>
        <form action="{{ url('/projects') }}" method="POST">
            @csrf
            <label for="name">Your name:</label>
            <input type="text" id="name" name="name">
            <label for="email">Your email:</label>
            <input type="text" id="email" name="email">
            <label for="type">Choose Project type:</label>
            <select name="type" id="type">
                <option value="web application">Web Application</option>
                <option value="mobile application">Mobile Application</option>
                <option value="desktop application">Desktop Application</option>
            </select>

            <fieldset>
                <label>App Requirements:</label>
                <input type="checkbox" name="requirements[]" value="Fast Performance">Fast Performance<br/>
                <input type="checkbox" name="requirements[]" value="Register/login">Register/login<br/>
                <input type="checkbox" name="requirements[]" value="Backend support">Backend support<br/>
                <input type="checkbox" name="requirements[]" value="Maintenance Support">Maintenance Support<br/>
                <input type="checkbox" name="requirements[]" value="Interactive UI">Interactive UI<br/>
                <input type="checkbox" name="requirements[]" value="Cloud Support">Cloud Support<br/>
            </fieldset>
            <input type="submit" value="Add Project">
        </form>
    </div>
@endsection
