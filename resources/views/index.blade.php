@extends('layouts.app')


@section('title', 'My Daily Tasks')

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="font-medium text-grey-700 underline decoration-pink-500">Add Task</a>

</nav>

@forelse ( $tasks as $task )


<div @class(['line-through'=>$task->completed] )>
    <a class="hover:bg-slate-300" href="{{ route('tasks.show',
     ['task'=> $task->id]) }}">{{ $task->title }} </a>
</div>

@empty
<div>There are no tasks.</div>
@endforelse ( )


@if ($tasks->count())
<nav class="mt-4">
    {{$tasks->links() }}
</nav>


@endif
@endsection