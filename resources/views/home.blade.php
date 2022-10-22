@extends('adminlte::page')

@section('title', 'ホーム')

@section('content_header')
    <h1>ようこそ！！</h1>
@stop

@section('content')
    <p>ログインできました。</p>
    <p>サイドメニューから商品の一覧・登録を行ってください。</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

