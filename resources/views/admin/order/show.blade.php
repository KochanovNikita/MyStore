@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Панель управления категорией:
        <div class="actions__icon"> {{ $order->title }}
            <a href="{{ route('admin.order.edit', $order) }}" class="mx-4 ">
                <i class="fas fa-pen text-warning"></i>
            </a>
            <form class="d-inline" action="{{route('admin.order.destroy', $order)}}" method="post">
                @csrf
                @method('delete')
                <input type='submit' class="d-none" id="{{'deleteorder'.$order->id}}">
                <label for="{{'deleteorder'.$order->id}}" class="delete">
                    <i class="fas fa-trash-alt text-danger"></i>
                </label>
            </form>
        </div>
    </x-content-header>
@endsection

@section('content')
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>{{ $order->id }}</th>
                        </tr>
                        <tr>
                            <th>Имя</th>
                            <th>{{ $order->title }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Подкатегория</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->subcategories as $suborder)
                            <tr>
                                <th>
                                    {{$suborder->id}}
                                </th>
                                <th>
                                    <a href="{{route('admin.suborder.show', $suborder->id)}}">
                                        {{$suborder->title}}
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
