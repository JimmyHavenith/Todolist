<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

	protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	 public function __construct()
	 {
	 		$this->middleware('auth');
	 }

	public function index()
	{
		if(\Auth::check()){
			$projects = \Auth::user()->projects()->get();
		}else{
			return view('auth/login');
		}
		
		return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		$input = Input::all();
		$input['user_id'] = \Auth::id();
		Project::create( $input );

		flash('Projet ajouté', 'success');
		return Redirect::route('projects.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function show(Project $project)
	{
		return view('projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function edit(Project $project)
	{
		return view('projects.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Project $project, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$project->update($input);

		flash('Projet modifié', 'success');
		return Redirect::route('projects.show', $project->slug);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function destroy(Project $project)
	{
		$project->delete();

		flash('Projet supprimé', 'success');
		return Redirect::route('projects.index');
	}

}
