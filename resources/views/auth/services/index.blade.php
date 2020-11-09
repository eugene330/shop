@extends('auth.layouts.master')

@section('title', 'Услуги')

@section('content')
    <div class="col-md-12">
        <h1>Услуги которые мы предоставляем</h1>
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
                    Действия
                </th>
            </tr>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->code }}</td>
                    <td>{{ $service->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('services.destroy', $service) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('services.show', $service) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('services.edit', $service) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $services->links() }}
        <a class="btn btn-success" type="button"
           href="{{ route('services.create') }}">Добавить услугу</a>
    </div>
@endsection
