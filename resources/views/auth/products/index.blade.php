@extends('auth.layouts.master')

@section('title', 'Вакансии')

@section('content')
    <div class="col-md-12">
        <h1>Вакансии</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Сфера
                </th>
                <th>
                    Пол
                </th>
                <th>
                    Страна
                </th>
                <th>
                    Зарплата
                </th>
                <th>
                    Активна
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sphere }}</td>
                    <td>{{ $product->sex }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price." ".$product->original_currency}}</td>
                    <td>{{ $product->count }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">Добавить вакансию</a>
    </div>
@endsection
