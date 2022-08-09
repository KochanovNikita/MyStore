@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления категориями</x-content-header>
@endsection

@section('content')
    <div class="col mb-3">
        <a href="{{route('admin.order.create')}}" class="btn btn-outline-primary">Создать категорию</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Категории</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            {{-- <td>{{$order->}}</td> --}}
                            <td colspan="3" class="actions__icon">
                                <a href="{{route('admin.order.show', $order)}}">
                                    <i class="fas fa-eye text-info"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- {{ $orders->onEachSide(1)->links() }} --}}
        </div>
    </div>
@endsection
