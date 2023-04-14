@extends('layouts.header')
@section('css')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('main')
<div class="performances">
  <h2 class="main-pf-title">最新の公演</h2>
  @include('common.performance', ['performances' => $performances])
</div>

@endsection