@extends('layouts.admin')

@section('content-header')
    <x-content-header>Панель управления товарами</x-content-header>
@endsection

@section('content')
    <div class="col mb-3">
        <a href="{{ route('admin.product.create') }}" class="btn btn-outline-primary">Создать товар</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Товар</h3>
                <form action="{{ route('admin.product.index') }}" class="card-tools col-11">
                    <div>
                        <div class="d-flex align-items-canter col-12 mb-3">
                            <div class="input-group">
                                <select class="select2 form-control"
                                name="categories[]"
                                multiple="multiple"
                                data-placeholder="выберите категорию">
                                    @foreach ($categories as $category)

                                    @isset($_GET['categories'])
                                    {{
                                        in_array($category->id, $_GET['categories']) ? 'selected' : ''
                                    }}
                                    @endisset
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <select class="select2 form-control"
                                name="subcategories[]"
                                multiple="multiple"
                                data-placeholder="выберите подкатегории">
                                    @foreach ($subcategories as $subcategory)
                                    @isset($_GET['subcategories'])
                                    {{
                                        in_array($subcategory->id, $_GET['subcategories']) ? 'selected' : ''
                                    }}
                                    @endisset
                                        <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <input type="text" name="title"
                                @isset($_GET['title'])
                                    value="{{$_GET['title'] ? $_GET['title'] : ''}}""
                                @endisset
                                class="form-control float-right"
                                placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center col-12">
                            <div class="input-group">
                                <select class="select2 form-control"
                                name="companies[]"
                                multiple="multiple"
                                data-placeholder="выберите компании">
                                    @foreach ($companies as $company)
                                    @isset($_GET['companies'])
                                    {{
                                        in_array($company->id, $_GET['companies']) ? 'selected' : ''
                                    }}
                                    @endisset
                                        <option value="{{$company->id}}">{{$company->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <select class="select2 form-control"
                                name="colors[]"
                                multiple="multiple"
                                data-placeholder="выберите цвета">
                                    @foreach ($colors as $color)
                                    @isset($_GET['colors'])
                                    {{
                                        in_array($color->id, $_GET['colors']) ? 'selected' : ''
                                    }}
                                    @endisset
                                        <option value="{{$color->id}}">{{$color->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <select class="select2 form-control"
                                name="groups[]"
                                multiple="multiple"
                                data-placeholder="выберите группы">
                                    @foreach ($groups as $group)
                                    @isset($_GET['groups'])
                                    {{
                                        in_array($group->id, $_GET['groups']) ? 'selected' : ''
                                    }}
                                    @endisset
                                        <option value="{{$group->id}}">{{$group->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <select class="select form-control"
                                name="gender_id"
                                data-placeholder="выберите пол">
                                    <option value="">Все</option>
                                    @foreach ($genders as $id => $gender)
                                        <option
                                        @isset($_GET['gender_id'])
                                            {{
                                                $_GET['gender_id'] ? 'selected' : ''
                                            }}
                                        @endisset
                                        value="{{$id}}">$gender</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive p-0 mb-3">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th></th>
                            <th>Название</th>
                            <th>Пол</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Цена со скидкой</th>
                            <th>На складе</th>
                            <th colspan="3">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img src="{{ url($product->preview_image_path) }}" alt="product" width="180"
                                        height="240">
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->gender_title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }} BYN</td>
                                <td>{{ $product->price_with_discount }} BYN</td>
                                <td>{{ $product->count }}</td>

                                <td colspan="3" class="actions__icon">
                                    <a href="{{ route('admin.product.show', $product) }}">
                                        <i class="fas fa-eye text-info"></i>
                                    </a>
                                    <a href="{{ route('admin.product.edit', $product) }}" class="mx-4">
                                        <i class="fas fa-pen text-warning"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('admin.product.destroy', $product) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <input type='submit' class="d-none" id="{{ 'deleteproduct' . $product->id }}">
                                        <label for="{{ 'deleteproduct' . $product->id }}" class="delete">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        @if(count($products) < 1)
                            <tr>
                                <td>
                                    <h3>Ничего не найдено</h3>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
