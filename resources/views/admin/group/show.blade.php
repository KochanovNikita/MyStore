@extends('layouts.admin')

@section('content-header')
    <x-content-header>
        Панель управления группой:
        <div class="actions__icon"> {{ $group->title }}
            <a href="{{ route('admin.group.edit', $group) }}" class="mx-4 ">
                <i class="fas fa-pen text-warning"></i>
            </a>
            <form class="d-inline" action="{{route('admin.group.destroy', $group)}}" method="post">
                @csrf
                @method('delete')
                <input type='submit' class="d-none" id="{{'deletegroup'.$group->id}}">
                <label for="{{'deletegroup'.$group->id}}" class="delete">
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
                            <th>{{ $group->id }}</th>
                        </tr>
                        <tr>
                            <th>Наименование</th>
                            <th>{{ $group->title }}</th>
                        </tr>
                        <tr>
                            <th>
                                <a href="{{route('admin.product.index', 'group_id='.$group->id)}}">
                                    Товары
                                </a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
