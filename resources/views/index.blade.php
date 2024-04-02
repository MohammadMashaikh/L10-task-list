
@extends('layouts.app')
@section('title', 'This is a list of my tasks!')


{{-- @if(count($tasks)) 
    @foreach ($tasks as $task)
     <li>{{$task->id}}</li> 
     <li>{{$task->title}}</li>   
    @endforeach
@endif --}}


    {{-- Another Solution --}}
{{-- @forelse ($tasks as $task)
    <li>{{$task->title}}</li>   
@empty
    <p>There is no tasks!</p>
@endforelse --}}



@section('content')
<nav class="mb-4">
  <a href="{{route('tasks.create')}}" class="link">Add Task!</a>

</nav>

@forelse ($tasks as $task)
    <div> 
        <a href="{{route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])> {{$task->title}} </a>
    </div> 
@empty
    <p>There are no tasks!</p>
@endforelse

@if ($tasks->count())
    <nav class="mt-4">
    {{ $tasks->links() }}
    </nav>
@endif

@endsection