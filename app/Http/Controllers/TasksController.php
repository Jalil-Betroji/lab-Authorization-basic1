<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class TasksController extends Controller
{
    public function index(Request $request){
        $tasks = Task::paginate(3);
        
        if (!Gate::allows('access-page')) {

        return redirect()->route('login');
    }
        if($request->ajax()){
            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ','%', $seachQuery);
            $tasks = Task::query()->where('nom','like','%'.$seachQuery. '%')->orWhere('description' , 'like' , '%' . $seachQuery . '%')->paginate(3);
               
            return view('search' , compact('tasks'))->render();
        }
       
        return view('main',compact('tasks'));
    }
    public function create(){
        if (!Gate::allows('access-page')) {

            return redirect()->route('login');
        }
        if(!Gate::allows('crud-tasks')){
            return redirect()->route('error');
        }
    $projects = Project::all();
        return view('add' , compact('projects'));
    }
    public function store(Request $request){
        if (!Gate::allows('access-page')) {

            return redirect()->route('login');
        }
        if(!Gate::allows('crud-tasks')){
            return redirect()->route('error');
        }
        $task = new Task;
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
          'projetId' => 'required',
          'description' => 'required'
        ]);
        $task::create($validatedData);
        return redirect()->route('add.task')->with('success' , 'tache a été ajouter avec succés');
    }
    public function edit($id){
        if (!Gate::allows('access-page')) {

            return redirect()->route('login');
        }
        if(!Gate::allows('crud-tasks')){
            return redirect()->route('error');
        }
        $task = Task::findOrFail($id);
        $projects = Project::all();
        return view('edit' , compact('task' , 'projects'));
    }
    public function update(Request $request , $id){
        if(!Gate::allows('crud-tasks')){
            return redirect()->route('error');
        }
        $task = Task::findOrFail($id);
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
          'projetId' => 'required',
          'description' => 'required'
        ]);
        $task->update($validatedData);
        return redirect()->route('edit.task' , ['id' => $task->id])->with('success' , 'tache a été modifier avec succés');
    }
    public function destroy($id ,User $user){
        if (!Gate::allows('access-page')) {

            return redirect()->route('login');
        }
        if(!Gate::allows('crud-tasks')){
            return redirect()->route('error');
        }
        $task = Task::findOrFail($id);
        $task->delete();
        $tasks = Task::paginate(3);
        return redirect('main')->with(compact('tasks'));
    }
}
