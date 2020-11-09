@extends('auth.layouts.master')

@section('title', 'Услуга ' . $service->name)

@section('content')
    <div class="col-md-12">
        <h1>Услуга {{ $service->name }} </h1>
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
                <td>{{ $service->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $service->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $service->name }}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{ $service->name_en }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $service->description }}</td>
            </tr>
            <tr>
                <td>Описание en</td>
                <td>{{ $service->description_en }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($service->image) }}"
                         height="240px"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
