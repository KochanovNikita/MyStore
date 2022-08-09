@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления заказами</x-content-header>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Заказы</h3>

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
                            <th>Покупатель</th>
                            <th>Адрес</th>
                            <th>Сумма покупки</th>
                            <th>Статус</th>
                            <th>Дата заказа</th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>
                                <a href="{{route('admin.user.show', $order->user_id)}}">{{$order->name}}</a>
                            </td>
                            <td>{{$order->address}}</td>
                            {{-- <td>{{$order->}}</td> --}}
                            <td>{{$order->total_price}} BYN</td>
                            <td>{{$order->status_title}}</td>
                            <td>{{$order->created_at_carbon}}</td>
                            <td colspan="3" class="actions__icon">
                                <a href="{{route('admin.order.show', $order->id)}}">
                                    <i class="fas fa-eye text-info"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $orders->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
