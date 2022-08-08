@extends('layouts.admin')

@section('content-header')
    <x-content-header>Создать пользователя</x-content-header>
@endsection

@section('content')
<div class="col-12 col-lg-6 col-xl-4">
    <form action="{{route('admin.user.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Введите имя<span class="text-danger">*</span></label>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="name"
            value="{{old('name')}}" class="form-control">
          </div>

        <div class="mb-3">
          <label class="form-label">Введите email<span class="text-danger">*</span></label>
          @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
          <input type="email" name="email"
          value="{{old('email')}}" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Введите номер телефона</label>
          @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
          <input type="tel"
          id="phone"
          name="phone"
          placeholder="+375-00-000-0000"
          pattern="^\+375\d{2}\d{3}\d{2}\d{2}$"
          maxlength="11"
          value="{{old('phone')}}" class="form-control">
        </div>

        @error('role_id')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Выберите роль</label>
            <select class="form-select" name="role_id">
                @foreach ($roles as $id => $role)
                    <option value="{{$id}}" {{old('role_id') == $id ? 'selected' :
                ($id == 2 ? 'selected' : '')}}>{{$role}}</option>
                @endforeach
              </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Введите адрес</label>
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="address"
            value="{{old('address')}}" class="form-control">
          </div>

        <div class="mb-3">
          <label class="form-label">Введите пароль<span class="text-danger">*</span></label>
          @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
          <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Повторите пароль<span class="text-danger">*</span></label>
            @error('password_confirmation')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="password" name="password_confirmation" class="form-control">
          </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
</div>

@endsection
