<?php
namespace Prego\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use Prego\Task;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;

class ProjectTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function postNewTask(Request $request, $id, Task $task)
    {
       $this->validate($request, [
            'task_name'     => 'required|min:5',
        ]);

       $task->task_name       = $request->input('task_name');
       $task->project_id = $id;

       $task->save();

       $tasks = $this->viewTasks($id);

       return redirect()->back()->with('info', 'Task created successfully')->withTasks($tasks);
    }

    public function viewTasks($id)
    {
        $tasks = Task::where('project_id', $id )->get();
        return $tasks;
    }
}