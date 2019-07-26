@extends('layouts.app')
@section('title', 'Home')

@section('styles')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-home">
        <h1 class="text-center">Você logou!</h1>
    </div>
@endsection