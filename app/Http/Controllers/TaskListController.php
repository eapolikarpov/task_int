<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskList;
use App\Repositories\TaskListRepository;

class TaskListController extends Controller
{
    protected $taskLists;
    public function __construct(TaskListRepository $taskLists)
    {
        $this->middleware('auth');
        $this->taskLists=$taskLists;
    }
    public function index(Request $request)
    {
        return view('taskLists.index', [
            'taskLists'=>$this->taskLists->forUser($request->user()),
        ]);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'=>'required|max:255',
        ]);

        $request->user()->taskLists()->create([
            'name'=>$request->name,
        ]);
        return redirect('/taskLists');
    }
    public function destroy(Request $request, TaskList $taskList)
    {
        $this->authorize('destroy',$taskList);
        $taskList->delete();
        return redirect('/taskLists');
    }
}
