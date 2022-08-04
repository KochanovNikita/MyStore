@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления товарами</x-content-header>
@endsection

@section('content')
    <div class="col mb-3">
        <a href="{{route('admin.product.create')}}" class="btn btn-outline-primary">Создать товар</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Товар</h3>

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
                            <th></th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Цена со скидкой</th>
                            <th>На складе</th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td><img src="{{url($product->preview_image_path)}}" alt="product"></td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}} BYN</td>
                            <td>{{$product->price_with_discount}} BYN</td>
                            <td>{{$product->count}}</td>

                            <td colspan="3" class="actions__icon">
                                <a href="{{route('admin.product.show', $product)}}">
                                    <i class="fas fa-eye text-info"></i>
                                </a>
                                <a href="{{route('admin.product.edit', $product)}}" class="mx-4">
                                    <i class="fas fa-pen text-warning"></i>
                                </a>
                                <form class="d-inline" action="{{route('admin.product.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type='submit' class="d-none" id="{{'deleteproduct'.$product->id}}">
                                    <label for="{{'deleteproduct'.$product->id}}" class="delete">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
