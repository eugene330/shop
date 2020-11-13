@extends('layouts.master')

@section('title', __('main.services'))

@section('content')
    @foreach($services as $services)
        <div class="panel">
            <a href="{{ route('services', $services->code) }}">
                <img src="{{ Storage::url($services->image) }}" height="70px">
                <h2>{{ $services->__('name') }}</h2>
            </a>
            <pre>
                {{ $services->__('description') }}
            </pre>
        </div>
    @endforeach
@endsection
