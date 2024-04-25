@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')



@section('content')


<form method="POST" action="{{ isset($task) ? route('tasks.update', ['task'=> $task->id]) :route('tasks.store') }}">
    @csrf
    @isset($task)
    @method('PUT')
    @endisset
    <div class="mb-4">
        <label class="block uppercase text-slate-700 mb-2" for="title">Title</label>
        <input class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none @error('title') border-red-500 @enderror  " type="text" name="title" id="title" value="{{$task -> title ?? $task ->title ?? old('title')}}">
        @error('title')
        <p class="text-red-500 text-text-sm-center ">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block uppercase text-slate-700 mb-2" for="description">Description</label>
        <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none @error('description') border-red-500 @enderror" name="description" id="description" rows="5">{{$task -> description ?? old('description')}}</textarea>
        @error('description')
        <p class="text-red-500 text-sm-center">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block uppercase text-slate-700 mb-2" for="long_description">Long Description</label>
        <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none @error('long_description') border-red-500 @enderror" name="long_description" id="long_description" rows="10">{{$task -> long_description ?? old('long_description')}}</textarea>
        @error('long_description')
        <p class="text-red-500 text-sm-center">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-2 ">

        <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-2 ring-slate-700/10 hover:bg-slate-100" type="submit">@isset($task)
            Update task
            @else
            Add Task
            @endisset
        </button>
        <a class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-2 ring-slate-700/10 hover:bg-slate-100" href="{{ route('tasks.index') }}">Cancel</a>

    </div>

</form>

@endsection