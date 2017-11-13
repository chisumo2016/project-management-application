<?php

namespace App\Http\Controllers;

use App\Models\Company;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dump(Auth::user()->id));P]
        //To Show all List of all company     $companies = Company::all();

        if(Auth::check()){

            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index', ['projects'=>$projects]);
           // return view('projects.index', compact('projects'));

        }
        return view('auth.login');
    }

    /**
     * Add User.
     *
     * @return \Illuminate\Http\Response
     */

    public function  adduser(Request $request)
    {
        // Add user to projects
        //Take a project , add a user to it

        $project = Project::find($request->input('project_id'));
        if (Auth::user()->id ==  $project->user_id){

            $user = User::where('email',$request->input('email'))->get();
            if( $user &&  $project){
                $project->users()->attach($user->id);
            }
        }


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null )
    {
        //
        $companies  = null;
        if (!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create',['company_id' =>$company_id, 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if (Auth::check()){

            $project =  Project::create([
                'name' => $request ->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' =>$request->user()->id     // $request->user()->id 5.5      Auth::user()->id  5.4, 23
            ]);

            if($project){
                return redirect()->route('projects.show', ['project' => $project->id])
                    ->with('success', 'Project Created successfully');
            }
        }

        return back()->withInput()->with('errors', 'Error creating new company');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Projects  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
       //$project = Project::where('id', $project->id)->first();

        $project = Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show',['project'=>$project, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id);
        return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project  $project)
    {
        //Validate
        //
        $projectUpdate =Project::where('id',$project->id)->update([
            'name' =>$request->input('name'),
            'description' =>$request->input('description'),
        ]);

        if($projectUpdate){
            return redirect()->route('projects.show',['project'=>$project->id])
                ->with('success','Project Updated Successfully ');
        }
              return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project  $project)
    {
        //
        $fidProject = Company::find($project->id);
        if($fidProject->delete()){

            //Redirect
            return redirect()->route('projects.index')->with('success','Project deleted Successfully');
        }
        return back()->withInput()->with('error','Projects could not be deleted');
    }
}
