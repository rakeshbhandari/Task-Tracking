@extends('layouts.app')


@section('title', 'My Daily Tasks')

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="font-medium text-grey-700 underline decoration-pink-500">Add Task</a>

</nav>

@forelse ( $tasks as $task )
<div>
    <a class="hover:bg-slate-100" href="{{ route('tasks.show',
     ['task'=> $task->id]) }}" @class(['line-through'=>$task->completed] )
        class="hover:bg-slate-100">{{ $task->title }} </a href>
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