@extends('layouts.app')

@section('title', isset($task) ? 'Update task' : "Create task")

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @method(isset($task) ? 'PUT' : 'POST')
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')]) value="{{ old('title') ?? (isset($task) ? $task->title : '') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" @class(['border-red-500' => $errors->has('description')]) value="{{ old('description') ?? (isset($task) ? $task->description : '') }}">
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')]) cols="30" rows="10">{{ old('long_description') ?? (isset($task) ? $task->long_description : '') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="completed">Completed</label>
            <input type="checkbox" name="completed" id="completed" value="1" {{ old('completed') || (isset($task) && $task->completed) ? 'checked' : '' }}>
            @error('completed')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn">
                {{ isset($task) ? 'Update' : 'Create' }}
            </button>
            <a href="{{ @route($task->id ? 'tasks.show' : 'tasks.index', $task->id ? ['task' => $task->id] : []) }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
