@extends('layouts.master')

@section('title', __('main.title'))

@section('content')
    <h1>@lang('main.all_products')</h1>
    <form method="GET" action="{{route("index")}}">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from">@lang('main.price_from')
                    <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                </label>
                <label for="price_to">@lang('main.to')
                    <input type="text" name="price_to" id="price_to" size="6" value="{{ request()->price_to }}">
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="sphere">
                    <input type="select" name="sphere" id="sphere"
                           value="{{request()->get('sphere')}}" @if(request()->has('sphere')) @endif> @lang('main.sphere')
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="sex">
                    <input type="select" name="sex" id="sex"
                           value="{{request()->get('sex')}}" @if(request()->has('sex')) @endif> @lang('main.sex')
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="category">
                    <input type="select" name="category" id="category"
                           value="{{request()->get('category')}}" @if(request()->has('category')) @endif> @lang('main.category')
                </label>
            </div>
            <div class="col-sm-2 col-md-2" style="clear: left ">
                <label for="hit">
                    <input type="checkbox" name="hit" id="hit"
                           @if(request()->has('hit')) checked @endif> @lang('main.properties.hit')
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="new">
                    <input type="checkbox" name="new" id="new"
                           @if(request()->has('new')) checked @endif> @lang('main.properties.new')
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="recommend">
                    <input type="checkbox" name="recommend" id="recommend"
                           @if(request()->has('recommend')) checked @endif> @lang('main.properties.recommend')
                </label>
            </div>
            <div class="col-sm-6 col-md-3" style="text-align: right">
                <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
                <a href="{{ route("index") }}" class="btn btn-warning">@lang('main.reset')</a>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
    {{ $products->links() }}
@endsection
