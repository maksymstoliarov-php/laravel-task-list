@extends('layouts.app')


@section('title', "Task view: " . $task->title)

<a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit task</a>

@section('content')
    <div>
        <p>
            {{ $task->title }}
        </p>
        <p>
            {{ $task->description }}
        </p>
        <p>
            {{ $task?->long_description }}
        </p>

        <p>
            @if($task->completed)
                Completed
            @else
                Not completed
            @endif
        </p>

        <p>
            {{ $task->created_at }}
        </p>
        <p>
            {{ $task->updated_at }}
        </p>

        <div>
            <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" value="Toggle complete">
            </form>
        </div>

        <div>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
        </div>
    </div>
@endsection
