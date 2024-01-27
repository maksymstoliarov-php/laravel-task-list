<?php

use App\Http\Requests\TaskRequest;
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
        'tasks' => Task::latest()->paginate(5),
    ]);
})->name('tasks.index');

//create
Route::view('/tasks/create', 'create')
    ->name('tasks.create');

//edit
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task,
    ]);
})->name('tasks.edit');

//show
Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task,
    ]);
})->name('tasks.show');

//create
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Created!');
})->name('tasks.store');

//edit
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Updated!');
})->name('tasks.update');
