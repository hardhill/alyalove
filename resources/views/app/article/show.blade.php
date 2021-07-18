@extends('layouts.app')
@section('content')
    <div id="app">
{{--        <view-slug slug="{{$article->slug}}"></view-slug>--}}
        <article-component></article-component>
        <hr>
        <comment-component></comment-component>
    </div>
@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
