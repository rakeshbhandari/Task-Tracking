<?php

use App\Models\Task;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view(
        'index',
        ['tasks' => Task::latest()->get()]
    );
})->name('tasks.index');


Route::view('/tasks/create', 'create')
    ->name('tasks.create');


Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findorFail($id)]);
})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    // NOTE: $task = new Task and $task->save(); will trigger an insert query in database
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();


    //->with() is used to flash a message to the session 
    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');




// providing name to route
// Route::get('/about', function () {
//     return "About Us";
// })->name('about');


//using the name to redirect to the route
// Route::get('/aboutme', function () {
//     return redirect()->route('about');
// });

// Route::get('/greet/{name}', function ($name) {
//     return "Welcome " . $name . "!";
// });

//all the routes that are not defined will be redirected to this route
Route::fallback(function () {
    return "Page Not Found";
});