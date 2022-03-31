<?php

namespace App\Http\Controllers;


// use Illuminate\Http\Request;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
// use App\Requests\UpdateTaskRequest;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // xong
        $tasks = Task::all();
        return view('tasks.index')->with(compact('tasks'));
        // return view('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //xong
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreTaskRequest Request $request)
    public function store(StoreTaskRequest $request)
    {
        // lưu // lỗi thêm
        Task::create($request->validated());
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        return view('tasks.show')->with(compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('tasks.edit')->with(compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateTaskRequest Request $request, $id)
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
        $task->update($request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return back();
    }
}