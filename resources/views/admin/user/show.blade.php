@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Панель управления пользователем:
        <div class="actions__icon"> {{ $user->email }}
            <a href="{{ route('admin.user.edit', $user) }}" class="mx-4 ">
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
        </div>
    </x-content-header>
@endsection

@section('content')
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>{{ $user->id }}</th>
                        </tr>
                        <tr>
                            <th>Имя</th>
                            <th>{{ $user->name }}</th>
                        </tr>
                        <tr>
                            <th>Аватар</th>
                            <th>
                                <img src="{{ url($user->avatar) }}" width="80" />
                            </th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>{{ $user->email }}</th>
                        </tr>
                        <tr>
                            <th>Номер телефона</th>
                            <th>{{ $user->phone ? $user->phone : '---' }}</th>
                        </tr>
                        <tr>
                            <th>Роль</th>
                            <th>{{ $user->role }}</th>
                        </tr>

                        <tr>
                            <th>Статус email</th>
                            <th>
                                @if ($user->email_verified_at)
                                    <span class="text-success">
                                        Подтвержден
                                    </span>
                                @else
                                    <span class="text-danger">
                                        Не подтвержден
                                    </span>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>Адрес</th>
                            <th>{{ $user->address ? $user->address : '---' }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
