@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать вакансию ' . $product->name)
@else
    @section('title', 'Создать вакансию')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать вакансию <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить вакансию</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'code'])
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{ $product->code }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название en: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name_en'])
                        <input type="text" class="form-control" name="name_en" id="name_en"
                               value="@isset($product){{ $product->name_en }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="sphere" class="col-sm-2 col-form-label">Сфера: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="sphere" id="sphere"
                               value="@isset($product){{ $product->sphere }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="sphere" class="col-sm-2 col-form-label">Сфера_en: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="sphere_en" id="sphere_en"
                               value="@isset($product){{ $product->sphere_en }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Страна: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'category_id'])
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                        @if($product->category_id == $category->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Зарплата: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'price'])
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="original_currency" class="col-sm-2 col-form-label">Валюта: </label>
                    <div class="col-sm-6">
                        <select name="original_currency" id="currency" class="form-control">
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->code }}"
                                        @isset($product)
                                        @if($product->original_currency === $currency->code)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $currency->code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="sex_id" class="col-sm-2 col-form-label">Пол: </label>
                    <div class="col-sm-6">
                        <select name="sex" id="sex" class="form-control">
                            <option>@lang('product.any')</option>
                            <option>@lang('product.male')</option>
                            <option>@lang('product.female')</option>
                            <option>@lang('product.couple')</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description'])
                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание en: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description_en'])
                        <textarea name="description_en" id="description_en" cols="72"
                                  rows="7">@isset($product){{ $product->description_en }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label for="count" class="col-sm-2 col-form-label">Актуальность (1/0): </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'count'])
                        <input type="text" class="form-control" name="count" id="count"
                               value="@isset($product){{ $product->count }}@endisset">
                    </div>
                </div>
                <br>
                @foreach([
    'hit'=>'Без опыта',
    'new'=>'По БИО',
    'recommend'=>'Акция',
] as $field=>$title)
                    <div class="input-group row">
                        <label for="name" class="col-sm-2 col-form-label">{{ $title }}: </label>
                        <div class="col-sm-6">
                            <input type="checkbox" class="form-control" name="{{ $field }}" id="{{ $field }}"
                                   @if(isset($product) && $product->$field === 1)
                                   checked="checked"
                                @endif
                            >
                        </div>
                    </div>
                    <br>
                @endforeach
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
