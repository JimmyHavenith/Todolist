<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Task;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Carbon\Carbon;

class TasksController extends Controller {

	protected $rules = [
		'name' => ['required', 'min:3'],
	];

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function index(Project $project)
	{
		if(\Auth::check()){
			$tasks = \Auth::user()->tasks()->get();
		}else{
			return view('auth/login');
		}

		return view('tasks.index', compact('project'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function create(Project $project)
	{
		return view('tasks.create', compact('project'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Project $project, Request $request, Task $task)
	{
		$this->validate($request, $this->rules);

		$input = Input::all();
		$input['project_id'] = $project->id;
		$input['user_id'] = \Auth::id();
		$input['slug'] = str_slug( $input['name'], '-');
		Task::create( $input );

		flash('Tâche ajoutée', 'success');
		return Redirect::route('projects.show', $project->slug);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function show(Project $project, Task $task)
	{
		return view('tasks.show', compact('project', 'task'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function edit(Project $project, Task $task)
	{
		$tags = Tag::all();
		return view('tasks.edit', compact('project', 'task', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Project $project, Task $task, Request $request, Tag $tag)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$task->update($input);

		flash('Tâche mise à jour', 'success');
		return Redirect::route('projects.show', [$project->slug]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function destroy($id, Project $project, $ajax = null)
	{
		$task = Task::findOrFail($id);
		$task->delete();
		flash('Tâche supprimée', 'success');
		if( $ajax == null ){
			return Redirect::route('projects.show', $project->slug);
		}
	}

	public function today(Project $project)
	{
		setlocale(LC_ALL, 'fr_FR.UTF-8' );
		Carbon::setLocale('fr');
		$project = $project->all();
		$now = Carbon::now();
		$todayTasks = [];
		$tasks = Task::where('user_id', \Auth::id())->where('date', '!=', '')->get();
		foreach ($tasks as $task)
		{
			$m = substr($task->date, 0, 2);
			$d = substr($task->date, 3, 2);
			$y = substr($task->date, 6, 4);
			$newdate = Carbon::create($y, $m, $d);
			if ($newdate == $now)
			{
				$todayTasks[] = $task;
			}
		}
		$todayProject = [];

		foreach ($todayTasks as $task)
		{
			if ( !in_array( $task->project_id, $todayProject ) )
			{
				$todayProject[] = $task->project_id;
			}
		}

		return view('tasks.today', compact('project', 'todayTasks', 'todayProject'));
	}

	public function tomorrow(Project $project)
	{
		setlocale(LC_ALL, 'fr_FR.UTF-8' );
		Carbon::setLocale('fr');
		$project = $project->all();
		$tomorrow = Carbon::tomorrow();
		$tomorrowTasks = [];
		$tasks = Task::where('user_id', \Auth::id())->where('date', '!=', '')->get();
		foreach ($tasks as $task)
		{
			$m = substr($task->date, 0, 2);
			$d = substr($task->date, 3, 2);
			$y = substr($task->date, 6, 4);
			$newdate = Carbon::create($y, $m, $d, 0, 0, 0);
			if ($newdate == $tomorrow)
			{
				$tomorrowTasks[] = $task;
			}
		}
		$tomorrowProject = [];
		foreach ($tomorrowTasks as $task)
		{
			if ( !in_array( $task->project_id, $tomorrowProject ) )
			{
				$tomorrowProject[] = $task->project_id;
			}
		}
		return view('tasks.tomorrow', compact('project', 'tomorrowTasks', 'tomorrowProject'));
	}

	public function check()
	{
		$input = Input::all();

		foreach($input['all-tasks'] as $value)
		{
			$task = Task::findOrFail($value);
			$task->completed = 0;
			$task->save();
		}

		if( isset($input['task-check']) )
		{
			foreach($input['task-check'] as $value)
			{
				$task = Task::findOrFail($value);
				$task->completed = 1;
				$task->save();
			}
		}

		return redirect()->back();
	}

	public function checkSingle($id)
	{

		$task = Task::findOrFail($id);
		$task->completed = 1;
		$task->save();

	}

	public function uncheckSingle($id)
	{

		$task = Task::findOrFail($id);
		$task->completed = 0;
		$task->save();

	}

	public function tasksName($id)
	{
		$task = Task::findOrFail($id);
		$text = Input::get('text');
		$task->name = $text;
		$task->save();

	}

}
