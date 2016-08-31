<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;

class TagsController extends Controller {

	protected $rules = [
		'name' => ['required', 'min:3'],
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

	public function index(Tag $tag)
	{
		if(\Auth::check()){

			if( count($tag) ) {
				$tag = $tag->first();
			} else {
				$tag = null;
			}

			return view('tags.show', compact('tag'));

		}else{
			return view('auth/login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store(Request $request, Tag $tag)
	{
		$this->validate($request, $this->rules);

		$input = Input::all();
		$input['user_id'] = \Auth::id();
		$slug = $input['slug'] = str_slug( $input['name'], '-');
		Tag::create( $input );

		flash('Projet ajouté', 'success');
		return Redirect::route('tags.show', $slug);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function show(Tag $tag)
	{
		return view('tags.show', compact('tag'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function edit(Tag $tag)
	{
		return view('tags.edit', compact('tag'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Tag $tag, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$tag->update($input);

		flash('Projet modifié', 'success');
		return Redirect::route('tags.show', $tag->slug);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function destroy($id, Tag $tag, $ajax = null)
	{
		$tag = Tag::findOrFail($id);
		$tag->delete();
		if( $ajax == null ){
			if( count($tag) ) {
				$tag = $tag->first();
			} else {
				$tag = null;
			}
			return view('tags.show', compact('tag'));
		}
	}

}
