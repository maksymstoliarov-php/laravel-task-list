@extends('layouts.app')

@section('title', "Create task")

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        {{ $errors }}
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ old('description') }}">
        </div>
        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" cols="30" rows="10">{{ old('long_description') }}</textarea>
        </div>
        <div>
            <label for="completed">Completed</label>
            <input type="checkbox" name="completed" id="completed" value="1" {{ old('completed') ? 'checked' : '' }}>
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
