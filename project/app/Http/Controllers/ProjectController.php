<?php

namespace App\Http\Controllers;

use App\Mail\AcceptMail;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    public function index(){
        //$projects = Project::all();
        //$projects = Project::orderBy('name', 'desc')->get();
        //$projects = Project::where('type', 'mobile app')->get();
        $projects = Project::latest()->get();

        return view('projects.index',
            ['projects' => $projects, 'name' => request('$name')]);
    }

    public function show($id){
        $project = Project::findOrFail($id);
        return view('projects.show', ['project'=>$project]);
    }

    public function create(){
        return view('projects.create');
    }

    public function store(){
        $project = new Project();
        //dd(request('name'));

        $project->name = request('name');
        $project->email = request('email');
        $project->type = request('type');
        $project->requirements = request('requirements');
        $project->save();

        return redirect("/")->with('msg', 'Project added successfully');
    }

    public function destroy($id){
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/projects');
    }

    public function send($id){
        $project = Project::findOrFail($id);
        $email = $project->email;
        $details = [
            'title' => 'Mail from Appjar',
            'body' => 'We can work on your project. We will contact you for
            further details'
        ];
        Mail::to($email)->send(new AcceptMail($details));

        return redirect('/projects');
    }
}
