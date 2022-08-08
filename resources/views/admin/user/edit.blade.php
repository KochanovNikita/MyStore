@extends('layouts.admin')

@section('content-header')
    <x-content-header>Редактировать пользователя:
        <a href="{{route('admin.user.show', $user)}}">{{ $user->email }} </a> </x-content-header>
@endsection

@section('content')
    <div class="col-12 col-lg-6 col-xl-4">
        <form action="{{ route('admin.user.update', $user) }}"
        method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label">Введите имя<span class="text-danger">*</span></label>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" name="name" value="{{ $user->name ? $user->name : old('name') }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Введите email<span class="text-danger">*</span></label>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="email" name="email" value="{{ $user->email ? $user->email : old('email') }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Введите номер телефона</label>
                @error('phone')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                <input type="tel"
                id="phone"
                name="phone"
                placeholder="+00-000-0000"
                pattern="^\d{2}\d{3}\d{2}\d{2}$"
                maxlength="9"
                value="{{old('phone') ? old('phone') : $user->phone}}" class="form-control">
              </div>

            @error('role_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <select class="form-select mb-3" name="role_id">
                @foreach ($roles as $id => $role)
                    <option value="{{ $id }}"
                        {{ old('role_id') == $id ? 'selected' : ($user->role_id == $id ? 'selected' : '') }}>
                        {{ $role }}
                    </option>
                @endforeach
            </select>

            <div class="mb-3">
                <label class="form-label">Введите адрес</label>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" name="address" value="{{ $user->address ? $user->address : old('address') }}"
                    class="form-control">
            </div>

            <div class="mb-3 ">
                <label for="formFile" class="form-label">Загрузите новый аватар</label>
                <div class="d-flex align-items-center">
                    <input class="form-control" type="file"
                    value="{{url($user->avatar)}}"
                    id="formFile" name="avatar_path">
                    <img src="{{url($user->avatar)}}" alt="avatar" width="80">
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
