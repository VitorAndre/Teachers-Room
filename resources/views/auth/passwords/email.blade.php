@extends('layouts.app')

@section('content')
<link href="{{ asset('css/estilo_auth.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
			<img id="img1" src="{{asset('images/icone.png')}}">
            <img id="img2" src="{{asset('images/icone_invertido.png')}}">
			<div class="titulo">{{ __("Teacher's Room") }}</div>
            <div class="card">
                <div class="card-body">
					<div class="subtitulo_login">Recuperar conta</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right"></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3 col-12 d-flex flex-row-reverse">
                                <button type="submit" class="btn botao_enviar text-light">{{ __('Enviar') }}</button>
                            </div>
                        </div>
                        <div class="msg">
							<a class="vinho col-md-1" href="{{ route('register') }}">{{ __('Registre-se aqui!') }}</a>
							<a class="vinho col-md-1" href="{{ route('login') }}">{{ __('Logue-se aqui!') }}</a>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
