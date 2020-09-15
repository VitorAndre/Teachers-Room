@extends('layouts.app')

@section('content')
	<link href="{{ asset('css/estilo_auth.css') }}" rel="stylesheet">
	<div class="container fade-in">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<img id="img1" src="{{asset('images/icone.png')}}">
				<img id="img2" src="{{asset('images/icone_invertido.png')}}">
				<div class="titulo">{{ __("TEACHER'S ROOM") }}</div>
				<div class="card">
					<div class="card-body">
						<div class="subtitulo_cadastro">Crie sua conta</div>
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row">
								<label for="name" class="col-md-2 col-form-label text-md-right"></label>
								<div class="col-md-8">
									<input id="name" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus placeholder="Nome">
									@error('nome')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-md-2 col-form-label text-md-right"></label>
								<div class="col-md-8">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="matricula" class="col-md-2 col-form-label text-md-right"></label>
								<div class="col-md-8">
									<input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" autofocus placeholder="Matrícula">
									@error('matricula')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-2 col-form-label text-md-right"></label>
								<div class="col-md-8">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm" class="col-md-2 col-form-label text-md-right"></label>
								<div class="col-md-8">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar">
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4 col-12 d-flex flex-row-reverse">
									<button type="submit" class="btn botao_enviar text-light">
										{{ __('Enviar') }}
									</button>
								</div>
							</div>
						</form>

						<div class="msg">
							<a class="vinho" href="{{ route('login') }}">{{ __('Já possui uma conta? Logue-se aqui!') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
