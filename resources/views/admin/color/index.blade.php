@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления цветами</x-content-header>
@endsection

@section('content')
    <div class="col mb-3">
        <a href="{{route('admin.color.create')}}" class="btn btn-outline-primary">Создать цвет</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Цвета</h3>

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
                            <th >Наименование</th>
                            <th></th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                        <tr>
                            <td>{{$color->id}}</td>
                            <td>
                                {{$color->title}}

                            </td>
                            <td>
                                <x-color :color="$color->title_en"></x-color>
                            </td>
                            <td colspan="3" class="actions__icon">
                                <a href="{{route('admin.color.show', $color)}}">
                                    <i class="fas fa-eye text-info"></i>
                                </a>
                                <a href="{{route('admin.color.edit', $color)}}" class="mx-4">
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
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $colors->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
