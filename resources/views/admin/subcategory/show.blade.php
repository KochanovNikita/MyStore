@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Панель управления подкатегорией:
        <div class="actions__icon"> {{ $subcategory->title }}
            <a href="{{ route('admin.subcategory.edit', $subcategory) }}" class="mx-4 ">
                <i class="fas fa-pen text-warning"></i>
            </a>
            <form class="d-inline" action="{{route('admin.subcategory.destroy', $subcategory)}}" method="post">
                @csrf
                @method('delete')
                <input type='submit' class="d-none" id="{{'deletesubcategory'.$subcategory->id}}">
                <label for="{{'deletesubcategory'.$subcategory->id}}" class="delete">
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
                            <th>{{ $subcategory->id }}</th>
                        </tr>
                        <tr>
                            <th>Название</th>
                            <th>{{ $subcategory->title }}</th>
                        </tr>
                        <tr>
                            <th>Родительская категория</th>
                            <th>{{ $subcategory->category }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
