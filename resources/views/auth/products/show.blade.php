@extends('auth.layouts.master')
@section('title', 'Вакансия ' . $product->name)
@section('content')
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        {{--        {{dd($product->getUSDPrice())}}--}}
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{ $product->name_en }}</td>
            </tr>
            <tr>
                <td>Зарплата</td>
                <td>{{ $product->price ." " . $product->original_currency }}</td>
            </tr>
            <tr>
                <td>Сфера</td>
                <td>{{ $product->sphere }}</td>
            </tr>
            <tr>
                <td>Сфера en</td>
                <td>{{ $product->sphere_en }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Описание en</td>
                <td>{{ $product->description_en }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($product->image) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Страна</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Пол</td>
                <td>
                    {{ $product->sex }}
                </td>
            </tr>
            <tr>
                <td>Лейблы</td>
                <td>
                    @if($product->isNew())
                        <span class="badge badge-success">По БИО</span>
                    @endif

                    @if($product->isRecommend())
                        <span class="badge badge-warning">Акция</span>
                    @endif

                    @if($product->isHit())
                        <span class="badge badge-danger">Без опыта</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
