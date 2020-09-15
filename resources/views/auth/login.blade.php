@extends('layouts.app')

@section('content')
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="339083941900-j17v34h0k5tam6her7hqgv0sdgmnhni8.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<link href="{{ asset('css/estilo_auth.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo_google.css') }}" rel="stylesheet">

<div class="container fade-in">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <img id="img1" src="{{asset('images/icone.png')}}">
            <img id="img2" src="{{asset('images/icone_invertido.png')}}">
            <div class="titulo">{{ __("TEACHER'S ROOM") }}</div>
            <div class="card">
                <div class="card-body">
					<div class="subtitulo_login">Inicie sua sessão</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="container">
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

							<div class="form-group row">
								<label for="password" class="col-md-2 col-form-label text-md-right"></label>
								<div class="col-md-8">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked>
							
							<div class="form-group row mb-0">
								<div class="col-md-7 offset-md-3 col-12 d-flex flex-row-reverse">
									<button type="submit" class="btn botao_enviar text-light">
										{{ __('Entrar') }}
									</button>
								</div>   
							</div>
							<!--
							<div id="outros" class="form-group row justify-content-center">
								<h6 class="outros_txt">Entrar com:</h6>
								
								<a href="{{ url('/login/facebook') }}" class="btn botao_facebook text-light">
									<i class="fa fa-facebook-f"></i>
								</a>
								<a href="" class="btn botao_google text-light">
									<i class="fa fa-google"></i>
								</a>
							</div>
						</div>
						<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="370" data-height="50" data-longtitle="true" data-lang="pt-BR"></div>
						-->
	                    </form>
	                    <div class="msg">
							@if (Route::has('password.request'))
								<a class="vinho col-md-1" href="{{ route('password.request') }}">
									{{ __('Recuperar senha') }}
								</a>
							@endif
							<a class="vinho col-md-1" href="{{ route('register') }}">{{ __('Criar conta') }}</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<link href="{{ asset('js/google.js') }}" rel="stylesheet">

@endsection