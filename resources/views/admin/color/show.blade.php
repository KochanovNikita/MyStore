@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Страница цвета:
        <div class="actions__icon"> {{ $color->title }}
            <a href="{{ route('admin.color.edit', $color) }}" class="mx-4 ">
                <i class="fas fa-pen text-warning"></i>
            </a>
            <form class="d-inline" action="{{route('admin.color.destroy', $color)}}" method="post">
                @csrf
                @method('delete')
                <input type='submit' class="d-none" id="{{'deletecolor'.$color->id}}">
                <label for="{{'deletecolor'.$color->id}}" class="delete">
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
                            <th>{{ $color->id }}</th>
                        </tr>
                        <tr>
                            <th>Имя</th>
                            <th>{{ $color->title }}</th>
                        </tr>
                        <tr>
                            <th>
                                Цвет
                            </th>
                            <th>
                                <x-color :color="$color->title_en"></x-color>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
