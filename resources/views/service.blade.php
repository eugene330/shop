@extends('layouts.master')

@section('title', __('main.services') . $service->__('name'))

@section('content')
    <h1>
        {{ $service->__('name') }}
    </h1>
    <p>
        {{ $service->__('description') }}
    </p>
    <div class="row">
        @foreach($services as $service)
            @include('layouts.card', compact('service'))
        @endforeach
    </div>
@endsection
