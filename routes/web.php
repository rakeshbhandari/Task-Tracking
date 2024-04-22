<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view(
        'index',
        [
            'tasks' => Task::latest()->get()
        ]
    );
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findorFail($id)]);
})->name('tasks.show');






// providing name to the route
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