@extends('layouts.app')


@section('title', "Tasks")

@section('content')
    @forelse($tasks ?? [] as $task)
        <p>
            <a href="{{ route('tasks.view', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </p>
    @empty
        <p>No tasks found</p>
    @endforelse
@endsection
