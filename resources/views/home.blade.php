@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tasks</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <form method="POST" action="add-task">
                        @csrf

                        <div class="form-group row">
                            <label for="task_name" class="col-md-4 col-form-label text-md-right">{{ __('Task Name') }}</label>

                            <div class="col-md-6">
                                <input id="task_name" type="task_name" class="form-control" name="task_name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="due_date" class="col-md-4 col-form-label text-md-right">{{ __('Due Date') }}</label>

                            <div class="col-md-6">
                                <input id="due_date" type="date" class="form-control" name="due_date" required autofocus>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br><hr>
                    @if (session('success'))
                        {{ session('success') }}
                        <br />
                    @endif
                    <ol>
                    @foreach($tasks as $task)
                        <li><b>Task Name</b> : {{$task->task_name}} <b>Due Date</b> : {{$task->due_date}} 
                        <a href="delete-task/{{$task->id}}">Delete</a> <a href="view-task/{{$task->id}}">View</a> </li>
                    @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
