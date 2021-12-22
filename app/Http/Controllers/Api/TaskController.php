<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Services\ResponseService;
use App\Services\TaskService;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;


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
            ['items' => $this->service->getItems()->toArray() ]
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
        $task = $this->sevice->store($request, $task);
        return ResponseService::SendJson(
            true,
            ['item' => $task->toArray()]
        );
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
            ['item' => $task->toArray()]
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task = $this->sevice->store($request, $task);
        return ResponseService::SendJson(
            true,
            ['item' => $task->toArray()]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->sevice->delete($request);
        return ResponseService::SendJson(
            $result,
            []
        );
    }
}
