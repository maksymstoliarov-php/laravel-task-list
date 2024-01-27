@extends('layouts.app')


@section('title', "Tasks")

<a href="{{ route('tasks.create') }}">Create task</a>

@section('content')
    @forelse($tasks ?? [] as $task)
        <p>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </p>
    @empty
        <p>No tasks found</p>
    @endforelse

    @if ($tasks->count())
        <nav>{{ $tasks->links() }}</nav>
    @endif
@endsection
