@extends('layouts.app')


@section('title', 'List of my daily tasks')

@section('content')
@forelse ( $tasks as $tasks )
<div>
    <a href="{{ route('tasks.show', ['id'=> $tasks->id]) }}">{{ $tasks->title }} </a href>
</div>

@empty
<div>There are no tasks.</div>
@endforelse ( )
@endsection