@extends('layouts.app')
@section('title', 'Edição de Usuários')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edição do Usuário ') . $user->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.saveEdit') }}">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ $user->id }}"/>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if($user){{ $user->name }}@else{{ old('name') }}@endif" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                                <div class="col-md-6">
                                    <select id="type" class="form-control select2 @error('type') is-invalid @enderror" name="type" required autocomplete="type">
                                        <option @if($user->type === 1){{ 'selected' }}@endif value="1">Pessoa Física</option>
                                        <option @if($user->type=== 0){{ 'selected' }}@endif value="0">Pessoa Jurídica</option>
                                    </select>

                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="cpfContainer">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                                <div class="col-md-6">
                                    <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="@if($user){{ $user->cpf }}@else{{ old('cpf') }}@endif" autocomplete="cpf">

                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="cnpjContainer" style="display: none">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-right">{{ __('CNPJ') }}</label>

                                <div class="col-md-6">
                                    <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="@if($user){{ $user->cnpj }}@else{{ old('cnpj') }}@endif" autocomplete="cnpj">

                                    @error('cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="rgContainer">
                                <label for="rg" class="col-md-4 col-form-label text-md-right">{{ __('RG') }}</label>

                                <div class="col-md-6">
                                    <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" value="@if($user){{ $user->rg }}@else{{ old('rg') }}@endif" autocomplete="rg">

                                    @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="ieContainer" style="display: none">
                                <label for="ie" class="col-md-4 col-form-label text-md-right">{{ __('IE') }}</label>

                                <div class="col-md-6">
                                    <input id="ie" type="text" class="form-control @error('ie') is-invalid @enderror" name="ie" value="@if($user){{ $user->ie }}@else{{ old('ie') }}@endif" autocomplete="ie">

                                    @error('ie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Grupo') }}</label>

                                <div class="col-md-6">
                                    <select id="group" class="form-control select2 @error('group') is-invalid @enderror" name="group" required autocomplete="group">
                                        @foreach($groups as $group)
                                            <option @if($user->group_id === $group->id){{ 'selected' }}@endif value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="phone form-control @error('phone') is-invalid @enderror" name="phone" value="@if($user){{ $user->phone }}@else{{ old('phone') }}@endif" autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Atualizar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
@endsection