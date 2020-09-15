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
						<div class="subtitulo_cadastro">Termine seu cadastro</div>
						<form method="POST" action="{{ route('matricula.update', $id) }}">
                            @csrf
                            @method('PATCH')

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

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4 col-12 d-flex flex-row-reverse">
									<button type="submit" class="btn botao_enviar text-light">
										{{ __('Enviar') }}
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
