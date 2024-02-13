@extends('layouts.app')

@section('title', "Task view: " . $task->title)

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">← Tasks</a>
    </nav>
    <div>
        <p class="mb-4 text-slate-700">
            {{ $task->description }}
        </p>

        @if($task->long_description)
            <p class="mb-4 text-slate-700">
                {{ $task?->long_description }}
            </p>
        @endif

        <p>
            @if($task->completed)
                <span class="form-medium text-green-500">Completed</span>
            @else
                <span class="form-medium text-red-500">Not completed</span>
            @endif
        </p>

        <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}</p>


        <div class="flex gap-2">
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn">Edit task</a>

            <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">Mask as {{ $task->completed ? 'not' : '' }} completed</button>
            </form>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">Delete task</button>
            </form>
        </div>
    </div>
@endsection
