@extends('layouts.app')


@section('title', "Task view: " . $task->title)

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
    @if($task->completed)
    <p>
        Completed
    </p>
    @endif
    <p>
        {{ $task->created_at }}
    </p>
    <p>
        {{ $task->updated_at }}
    </p>
</div>
@endsection
