<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//home
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

//index
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->where('completed', 1)->get(),
    ]);
})->name('tasks.index');

//create
Route::view('/tasks/create', 'create')
    ->name('tasks.create');

//edit
Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit', [
        'task' => Task::findOrFail($id),
    ]);
})->name('tasks.edit');

//show
Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => Task::findOrFail($id),
    ]);
})->name('tasks.show');

//create
Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'nullable',
        'completed' => 'boolean',
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->completed = $data['completed'] ?? false;
    $task->save();

//    session()->flash('message', 'Task Created!');

    return redirect()->route('tasks.show', $task->id)->with('success', 'Task Created!');
})->name('tasks.store');

//edit
Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'nullable',
        'completed' => 'boolean',
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->completed = $data['completed'] ?? false;
    $task->save();

    return redirect()->route('tasks.show', $task->id)->with('success', 'Task Updated!');
})->name('tasks.update');
