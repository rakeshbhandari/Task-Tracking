<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index', [
        //paginate(10) will show 10 records per page
        'tasks' => Task::latest()->paginate(10) //latest() will show the latest record first
    ]);
})->name('tasks.index');


Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view(
        'edit',
        ['task' => $task]
    );
})->name('tasks.show');

Route::get('/tasks/{task}', function (Task $task) {
    return view(
        'show',
        ['task' => $task]
    );
})->name('tasks.show');


// NOTE: $task = new Task and $task->save(); will trigger an insert query in database
Route::post('/tasks', function (TaskRequest $request) {

    //this below will do the same as above
    $task = Task::create($request->validated());

    //->with() is used to flash a message to the session 
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');


// NOTE: $task = Task::findOrFail($id); and $task->save(); will trigger an update query in database
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task->update($request->validated());
    //->with() is used to flash a message to the session 
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    //->with() is used to flash a message to the session 
    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

//all the routes that are not defined will be redirected to this route
Route::fallback(function () {
    return "Page Not Found";
});