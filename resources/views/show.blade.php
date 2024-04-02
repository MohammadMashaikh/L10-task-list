{{--
this @extends like the include or require
--}}
@extends('layouts.app')
@section('title', $task->title)

{{--
I am here putting all the code inside the yield content in app.blade.php
--}}
@section('content')

<div class="mb-4">
<a href="{{route('tasks.index')}}" class="link">← Go back to the task list!</a>
</div>

<p class="mb-4 text-slate-700">{{ $task->description }}</p>

@if($task->long_description)
    <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
@endif

<p class="mb-4 text-sm  text-slate-500">Created {{$task->created_at->diffforhumans()}} . Updated {{$task->updated_at->diffforhumans()}}</p>
<p></p>


<p class="mb-4">
    @if($task->completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not Completed</span>
    @endif
</p>
<div class="flex gap-2">
    <a class="btn" href="{{route('tasks.edit', ['task' => $task->id])}}">Edit</a>

    <form method="POST" action="{{route('tasks.toggle-complete', ['task' => $task])}}">
        @csrf
        @method('PUT')
        <button class="btn" type="submit">Mark as {{$task->completed ? 'Not Completed' : 'Completed'}}</button>
    </form>

<form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
@csrf
@method('DELETE')
<button class="btn" type="submit">Delete</button>
</form>
    </div>

@endsection