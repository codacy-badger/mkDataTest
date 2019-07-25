@extends('layouts.app')
@section('title', 'Lista de Usuários')

@section('styles')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="container">
        <table class="table table-hover table-bordered" id="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">CPF</th>
                    <th scope="col">RG</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">IE</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Telefone(s)</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>@if($user->type === 0) {{ "Pessoa Jurídica" }}@else{{ "Pessoa Física" }}@endif</th>
                        <th>{{ $user->cpf }}</th>
                        <th>{{ $user->rg }}</th>
                        <th>{{ $user->cnpj }}</th>
                        <th>{{ $user->ie }}</th>
                        <th>{{ date_format($user->created_at, 'd/m/Y') }}</th>
                        <th>{{ $user->group['name'] }}</th>
                        <th>@if($user->status === 0){{ "Inativo" }}@else{{ "Ativo" }}@endif</th>
                        <th>{{ $user->phone }}</th>
                        <th style="white-space: nowrap; width: 100%;">
                            <a id="alter_status" class="@if($user->status === 0){{ 'text-danger' }}@else{{ 'text-success' }}@endif" href="javascript:void(0);"><i class="fas fa-power-off"></i></a>
                            <a class="text-primary" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/list.js') }}"></script>
@endsection