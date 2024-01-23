@extends('layouts.app')

@section('title', isset($task) ? 'Update task' : "Create task")

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @method(isset($task) ? 'PUT' : 'POST')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?? (isset($task) ? $task->title : '') }}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ old('description') ?? (isset($task) ? $task->description : '') }}">
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" cols="30" rows="10">{{ old('long_description') ?? (isset($task) ? $task->long_description : '') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="completed">Completed</label>
            <input type="checkbox" name="completed" id="completed" value="1" {{ old('completed') || (isset($task) && $task->completed) ? 'checked' : '' }}>
            @error('completed')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">
                {{ isset($task) ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
@endsection
