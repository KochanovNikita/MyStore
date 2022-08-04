@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Панель управления товаром:
        <div class="actions__icon"> {{ $product->title }}
            <a href="{{ route('admin.product.edit', $product) }}" class="mx-4 ">
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
        </div>
    </x-content-header>
@endsection

@section('content')
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>{{ $product->id }}</th>
                        </tr>
                        <tr>
                            <th>Название</th>
                            <th>{{ $product->title }}</th>
                        </tr>
                        <tr>
                            <th>Брэнд</th>
                            <th>{{ $product->company->title }}</th>
                        </tr>
                        <tr>
                            <th>Категория</th>
                            <th>{{$product->category->title}}</th>
                        </tr>
                        <tr>
                            <th>Подкатегории</th>
                            <th>{{$product->subcategories->implode('title', ', ')}}</th>
                        </tr>
                        <tr>
                            <th>Цена</th>
                            <th>{{ $product->price }} BYN</th>
                        </tr>
                        <tr>
                            <th>Цена со скидкой</th>
                            <th>{{ $product->price_with_discount }} BYN</th>
                        </tr>
                        <tr>
                            <th>Количество на складе</th>
                            <th>{{$product->count}}</th>
                        </tr>
                        <tr>
                            <th>Описание</th>
                            <th>{{ $product->description }}</th>
                        </tr>
                        <tr>
                            <th>Подробнее</th>
                            <th class="text-wrap">{{ $product->content }}</th>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <x-slider :product="$product"></x-slider>
    </div>
@endsection
