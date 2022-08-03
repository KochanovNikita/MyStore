@extends('layouts.admin')

@section('content-header')
    <x-content-header>Редактировать категории:
        <a href="{{route('admin.subcategory.show', $subcategory)}}">{{ $subcategory->title }} </a> </x-content-header>
@endsection

@section('content')
    <div class="col-12 col-lg-6 col-xl-4">
        <form action="{{ route('admin.subcategory.update', $subcategory) }}"
        method="post" >
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label">Введите наименование<span class="text-danger">*</span></label>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" name="title" value="{{ $subcategory->title ? $subcategory->title : old('title') }}"
                    class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
