@extends('layouts.admin')

@section('content-header')
    <x-content-header>Создать подкатегорию</x-content-header>
@endsection

@section('content')
<div class="col-12 col-lg-6 col-xl-4">
    <form action="{{route('admin.subcategory.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Введите название подкатегории<span class="text-danger">*</span></label>
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="title"
            value="{{old('title')}}" class="form-control">
          </div>

          <div class="form-group mb-3">
            <label>Выберите родительскую категорию</label>
            @error('category_id')
          <span class="text-danger">{{$message}}</span>
          @enderror
            <select class="form-control select2"
            name="category_id"
            style="width: 100%;">
              @foreach ($categories as $category)
                <option
                {{old('category_id') == $category->id ? 'selected' : ''}}
                value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
</div>
@endsection
