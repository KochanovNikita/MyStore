@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления заказами</x-content-header>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Заказы</h3>

                <form action="{{route('admin.order.index')}}" class="card-tools">
                    <div class="input-group mb-3">
                        <select class="form-control select2" name="price">
                            <option value="" selected>Без сортировки</option>
                            <option
                            @isset($_GET['price'])
                                {{
                                    $_GET['price'] == 1 ? 'selected' : ''
                                }}
                            @endisset
                            value="1">По возрастанию цены</option>
                            <option value="2"
                            @isset($_GET['price'])
                                {{
                                    $_GET['price'] == 2 ? 'selected' : ''
                                }}
                            @endisset>По убыванию цены</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control select2" name="time">
                            <option value="" selected>Без сортировки</option>
                            <option value="1"
                            @isset($_GET['time'])
                                {{
                                    $_GET['time'] == 1 ? 'selected' : ''
                                }}
                            @endisset>Сначала новые</option>
                            <option value="2"
                            @isset($_GET['time'])
                                {{
                                    $_GET['time'] == 2 ? 'selected' : ''
                                }}
                            @endisset>Сначала старые</option>
                        </select>
                    </div>
                    <div class="input-group d-flex mb-3">
                        <input class="form-control" name="prices[]"
                        value="{{
                            isset($_GET['prices'][0]) ? $_GET['prices'][0] : '0'
                        }}"
                        type="number" min="0" placeholder="Цена от">
                        <input class="form-control" name="prices[]"
                        value="{{
                            isset($_GET['prices'][1]) ? $_GET['prices'][1] : '9999999'
                        }}"
                        type="number" min="0" placeholder="Цена до">
                    </div>
                    <div class="input-group w-100" style="width: 150px;">
                        <input type="text" name="user"
                        @isset($_GET['user'])
                                value="{{$_GET['user'] ? $_GET['user'] : ''}}"
                        @endisset
                        class="form-control float-right" placeholder="Search">
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
