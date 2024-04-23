@extends('layouts.app')


@section('title', 'List of my daily tasks')

@section('content')
@forelse ( $tasks as $tasks )
<div>
    <a href="{{ route('tasks.show', ['task'=> $tasks->id]) }}">{{ $tasks->title }} </a href>
</div>

@empty
<div>There are no tasks.</div>
@endforelse ( )

<!--adding pagination  -->
@if ($tasks->count())
<nav>
    {{$tasks->links() }}
</nav>


@endif
@endsection