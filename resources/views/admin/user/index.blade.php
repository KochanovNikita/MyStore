@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления пользователями</x-content-header>
@endsection

@section('content')
    <div class="col mb-3">
        <a href="{{route('admin.user.create')}}" class="btn btn-outline-primary">Создать пользователя</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Пользователи</h3>

                <form method="get" action="{{route('admin.user.index')}}" class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text"
                        name="key_word"
                        @isset($_GET['key_word'])
                        value="{{$_GET['key_word'] ? $_GET['key_word'] : '' }}"
                        @endisset

                        class="form-control float-right"
                        placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th colspan="2">Email</th>
                            <th>Номер телефона</th>
                            <th>Роль</th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td colspan="2">{{$user->email}}
                                @if ($user->email_verified_at)
                                <i class="fas fa-user-check text-success mx-2"></i>
                                @else
                                <i class="fas fa-user-times text-secondary mx-2"></i>
                                @endif
                            </td>
                            <td>{{$user->phone ? $user->phone : ''}}</td>
                            <td>{{$user->role}}</td>
                            <td colspan="3" class="actions__icon">
                                <a href="{{route('admin.user.show', $user)}}">
                                    <i class="fas fa-eye text-info"></i>
                                </a>
                                <a href="{{route('admin.user.edit', $user)}}" class="mx-4">
                                    <i class="fas fa-pen text-warning"></i>
                                </a>
                                <form class="d-inline" action="{{route('admin.user.destroy', $user)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type='submit' class="d-none" id="{{'deleteUser'.$user->id}}">
                                    <label for="{{'deleteUser'.$user->id}}" class="delete">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $users->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
