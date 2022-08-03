@extends('layouts.errors')

@section('content')
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>404 Error Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">
                                <a class="btn btn-primary mx-3" href="{{route('welcome')}}">На главную</a>
                            </li>
                            <li class="">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-primary">Выйти</button>
                                </form>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content ">
            <div class="error-page">
                <h2 class="headline text-info"> 403</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-info"></i> Похоже у вас нет прав доступа</h3>

                    <p>
                        Извините, но для жоступа к этому ресурсу нужно обладасть правами администратора.
                        Пожалуйста, подождите пока вам дадут доступ.
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
    </div>

@endsection
