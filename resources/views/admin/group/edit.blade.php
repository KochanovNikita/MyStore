@extends('layouts.admin')

@section('content-header')
    <x-content-header>Редактировать группу:
        <a href="{{route('admin.group.show', $group)}}">{{ $group->title }} </a> </x-content-header>
@endsection

@section('content')
    <div class="col-12 col-lg-6 col-xl-4">
        <form action="{{ route('admin.group.update', $group) }}"
        method="post" >
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label">Введите наименование<span class="text-danger">*</span></label>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" name="title" value="{{ $group->title ? $group->title : old('title') }}"
                    class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
