<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Services\ResponseService;
use App\Services\TaskService;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class TaskController extends ApiController
{
    
        //
    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResponseService::SendJson(
            true,
            $this->service->getItems()->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), ['text' => 'not_regex:/.*!+.*/i']);

        if ($validator->fails()) {
            return ResponseService::SendJson(
                false,
                [],
                403,
                ['Stop yelling at me !!!!!']
            );
        } else {

            $task = $this->service->store($request, $task);
            return ResponseService::SendJson(
                true,
                $task->toArray()
            );
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return ResponseService::SendJson(
            true,
            $task->toArray()
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        
        $validator = Validator::make($request->all(), ['text' => 'not_regex:/.*!+.*/i']);

        if ($validator->fails()) {
            return ResponseService::SendJson(
                false,
                [],
                403,
                ['Stop yelling at me !!!!!']
            );
          } else {
            $result = $this->service->store($request, $task);
            return ResponseService::SendJson(
                true,
                $result->toArray()
            );
          }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //dd($task);
        return ResponseService::SendJson(
            true,
            $this->service->delete($task)
        );
    }
}
