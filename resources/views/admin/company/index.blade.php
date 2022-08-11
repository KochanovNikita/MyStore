@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления компаниями</x-content-header>
@endsection

@section('content')
    <div class="col mb-3">
        <a href="{{route('admin.company.create')}}" class="btn btn-outline-primary">Создать компанию</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Компании</h3>

                <form action="{{route('admin.company.index')}}" class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text"
                        name="title"
                        @isset($_GET['title'])
                            value="{{$_GET['title'] ? $_GET['title'] : ''}}"
                        @endisset
                        class="form-control float-right"
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
                            <th>Название</th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->title}}</td>
                            <td colspan="3" class="actions__icon">
                                <a href="{{route('admin.company.show', $company)}}">
                                    <i class="fas fa-eye text-info"></i>
                                </a>
                                <a href="{{route('admin.company.edit', $company)}}" class="mx-4">
                                    <i class="fas fa-pen text-warning"></i>
                                </a>
                                <form class="d-inline" action="{{route('admin.company.destroy', $company)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type='submit' class="d-none" id="{{'deletecompany'.$company->id}}">
                                    <label for="{{'deletecompany'.$company->id}}" class="delete">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $companies->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
