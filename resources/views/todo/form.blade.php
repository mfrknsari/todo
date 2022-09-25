@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <x-todo-form
                        :method="isset($todo) ? 'PATCH' : 'POST'"
                        :route="isset($todo) ? route('todo.update', $todo->id) : route('todo.store')"
                        :isParameter="isset($todo) ? true : false"
                        :todo="isset($todo)  ? $todo : null"
                >
                </x-todo-form>
            </div>
        </div>
    </div>
@endsection
