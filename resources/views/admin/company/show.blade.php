@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Панель управления компанией:
        <div class="actions__icon"> {{ $company->title }}
            <a href="{{ route('admin.company.edit', $company) }}" class="mx-4 ">
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
                            <th>{{ $company->id }}</th>
                        </tr>
                        <tr>
                            <th>Название</th>
                            <th>{{ $company->title }}</th>
                        </tr>
                        <tr>
                            <th>Товары</th>
                            <th>
                                <a href="{{route('admin.product.index', 'company_id='.$company->id)}}">
                                    {{ $company->title }}
                                </a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
