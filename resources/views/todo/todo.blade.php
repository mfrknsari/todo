@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="text-align: right">
            <a href="{{  route('todo.create') }}" class="btn btn-success">Yeni Ekle</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Dead Time</th>
                        <th scope="col">Cogs</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr @if($todo->isDead()) class="bg-danger" @endif>
                            <th scope="row">{{$todo->id}}</th>
                            <td>{{$todo->title}}</td>
                            <td>{{$todo->isStatus()}}</td>
                            <td>{{$todo->dead_at}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        İşlemler
                                    </button>
                                    <ul class="dropdown-menu">
                                        @if($todo->status == 0)
                                            <li><a class="dropdown-item"
                                                   href="{{ route('todo.statusUpdate',['id'=> $todo->id]) }}">Tamamla</a>
                                            </li>
                                        @endif
                                        <li><a class="dropdown-item"
                                               href="{{ route('todo.edit',$todo->id) }}">Düzenle</a></li>
                                        <li>
                                            <form action="{{ route('todo.destroy',$todo->id) }}" method="post"
                                                  id="form-{{$todo->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item"
                                                   onclick="document.getElementById('form-{{$todo->id}}').submit()">
                                                    Sil</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
