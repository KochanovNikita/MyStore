@extends('layouts.auth')

@section('content')
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">Войти в аккаунт</p>

    <form action="{{route('login')}}" method="post">
        @csrf
      <div class="input-group mb-3">
        <input type="email" class="form-control"
        name="email" placeholder="введите Ваш Email"
        value="{{old('email')}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>

      </div>
      @error('email')
          <div class="text-danger">{{$message}}</div>
      @enderror
      <div class="input-group mb-3">
        <input type="password" class="form-control"
        name="password" placeholder="Введите Ваш пароль">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      @error('password')
        <div class="text-danger">{{$message}}</div>
    @enderror
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox"
            name="remember" id="remember">
            <label for="remember">
              Запомнить меня
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Войти</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p class="mb-1">
      <a href="#">Не помню пароль</a>
    </p>
    <p class="mb-0">
      <a href="{{route('register')}}" class="text-center">Зарегистрироваться</a>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
@endsection
