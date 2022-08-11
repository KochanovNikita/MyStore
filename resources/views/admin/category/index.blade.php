@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления категориями</x-content-header>
@endsection

@section('content')
    <div class="col mb-3">
        <a href="{{route('admin.category.create')}}" class="btn btn-outline-primary">Создать категорию</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Категории</h3>

                <form action="{{route('admin.category.index')}}"
                 class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text"
                        name="title"
                        class="form-control float-right"
                        @isset($_GET['title'])
                            value="{{$_GET['title'] ? $_GET['title'] : ''}}"
                        @endisset
                        placeholder="Search">
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
                            <th>Наименование</th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td colspan="3" class="actions__icon">
                                <a href="{{route('admin.category.show', $category)}}">
                                    <i class="fas fa-eye text-info"></i>
                                </a>
                                <a href="{{route('admin.category.edit', $category)}}" class="mx-4">
                                    <i class="fas fa-pen text-warning"></i>
                                </a>
                                <form class="d-inline" action="{{route('admin.category.destroy', $category)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type='submit' class="d-none" id="{{'deletecategory'.$category->id}}">
                                    <label for="{{'deletecategory'.$category->id}}" class="delete">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $categories->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
