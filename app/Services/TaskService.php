<?php

namespace  App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    public function getItems(){
        return Task::all();
    }

    public function store(Request $request, Task $task){
        
        $task->fill($request->only($task->getFillable()));
        $task->save();

        return $task;
    }

    public function delete(Task $task){
        return  $task->delete();
    }
}
