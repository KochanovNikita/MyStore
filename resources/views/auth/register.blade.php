@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Зарегистрироваться</p>

            <form action="{{ route('register') }}" method="post">
                @csrf
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control"
                    name="name" placeholder="Введите Ваше имя"
                        value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" class="form-control"
                    name="email" placeholder="Введите Ваш Email"
                        value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control"
                    name="password" placeholder="Введите пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>


                <div class="input-group mb-3">
                    <input type="password" class="form-control"
                    name="password_confirmation" placeholder="Подтвердите пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <a href="{{ route('login') }}" class="text-center">У меня уже есть аккаунт</a>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Создать</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
@endsection
