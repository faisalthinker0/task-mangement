<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index()
    {
        //return all tasks

        $tasks = Task::all();

        $totalTask = count($tasks);

        $completedTasks = count(Task::where('status', '=', 'Completed')->get());
        $inprogressTasks = count(Task::where('status', '=', 'In Progress')->get());
        return view('index', ['tasks' => $tasks, 'totalTasks' => $totalTask, 'completedTasks' => $completedTasks, 'inprogressTasks' => $inprogressTasks]);
    }

    public function createTaskForm()
    {
        return view('createTaskForm');
    }

    public function createNewTask(Request $request)
    {
        $request->validate([
            'title' => 'unique:tasks',
        ]);
        Task::create($request->all());
        return redirect(route('index'));
    }

    public function editTaskForm(Request $request, $id)
    {
        $tasks = DB::table('tasks')->where('id', $id)->get();
        return view('editTaskForm', ['tasks' => $tasks]);
    }

    public function editTask(Request $request)
    {
//        $request->validate([
//            'title' => 'unique:tasks',
//        ]);
        Task::find($request->id)->update($request->all());
        return redirect(route('index'));

    }

    public function editAllTasks()
    {
        $tasks = Task::all();
        return view('editAllTasks', ['tasks' => $tasks]);
    }

    public function deleteTask(Task $task)
    {
//        dd($id);

        $task->delete();
        return redirect(route('editAllTasks'));
    }

    public function completedTasks()
    {
        $tasks = Task::where('status', '=', 'Completed')->get();

        return view('specificTasks', ['tasks' => $tasks]);
    }

    public function inprogressTasks()
    {
        $tasks = Task::where('status', '=', 'In Progress')->get();
        return view('specificTasks', ['tasks' => $tasks]);
    }
}
