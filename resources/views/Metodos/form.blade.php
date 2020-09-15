@extends ('layouts.app')

@section('content')
@push('page_cadastrar')
active
@endpush
<link href="{{ asset('css/estilo_cadastrar.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br>
                    @endif
                        @if(session()->get('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div><br />
                        @endif
                    <form method="POST" action="{{action('BuscarController@store')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <!-- Título -->

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ old('titulo') }}" required autofocus>

                                @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Materiais -->
                        <div class="form-group row">
                            <label for="materiais" class="cor-texto col-md-4 col-form-label text-md-right">{{ __('Materiais') }}</label>
                            <div class="col-md-6">
                                <textarea class="my-editor form-control {{ $errors->has('materiais') ? 'is-invalid' : '' }}" name="materiais" value="{{ old('materiais') }}" required>{{ old('materiais') }}</textarea>
                                @error('materiais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Método -->
                        <div class="form-group row">
                            <label for="metodo" class="cor-texto col-md-4 col-form-label text-md-right">{{ __('Método') }}</label>
                            <div class="col-md-6">
                                <textarea class="my-editor form-control {{ $errors->has('metodo') ? 'is-invalid' : '' }}" name="metodo" value="{{ old('metodo') }}" required>{{ old('metodo') }}</textarea>
                                @error('metodo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Palavras_chave -->
                        <div class="form-group row">
                            <label for="palavras_chave" class="cor-texto col-md-4 col-form-label text-md-right">{{ __('Palavras-Chave') }}</label>
                            <div class="col-md-6">
                                <textarea class="my-editor form-control {{ $errors->has('palavras_chave') ? 'is-invalid' : '' }}" name="palavras_chave" value="{{ old('palavras_chave') }}" required>{{ old('palavras_chave') }}</textarea>
                                @error('palavras_chave')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="area_conhecimento" class="col-md-4 col-form-label text-md-right">{{ __('Área de conhecimento') }}</label>
                            <div class="col-md-6">
                                <select id="area_conhecimento" onclick="HabilitarAreaDeAtuacao()" class="form-control{{ $errors->has('area_conhecimento') ? ' is-invalid' : '' }}" name="area_conhecimento" required autofocus>
                                    <option></option>
                                    @foreach($areas_conhecimento as $area_conhecimento)
                                    @if(old('area_conhecimento') == $area_conhecimento->id)
                                    <option value="{{$area_conhecimento->id}}" selected>{{$area_conhecimento->nome}}</option>
                                    @else
                                    <option value="{{$area_conhecimento->id}}">{{$area_conhecimento->nome}}</option>
                                    @endif
                                    @endforeach
                                    @if ($errors->has('area_conhecimento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area_conhecimento') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area_atuacao" class="col-md-4 col-form-label text-md-right">{{ __('Área de Atuação') }}</label>
                            <div class="col-md-6">
                                <select id="areas_atuacao" disabled class="form-control{{ $errors->has('area_atuacao') ? 'is-invalid' : '' }}" name="area_atuacao" required>
                                    <option></option>
                                    @foreach($area_atuacaos as $area_atuacao)
                                        <option value="{{$area_atuacao->id}}">{{$area_atuacao->nome}}</option>
                                    @endforeach
                                </select>


                                @if ($errors->has('area_atuacao'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('area_atuacao') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="video_url" class="col-md-4 col-form-label text-md-right">{{ __('Url de Vídeo') }}</label>

                            <div class="col-md-6">
                                <input id="video_url" type="url" class="form-control{{ $errors->has('video_url') ? ' is-invalid' : '' }}" name="video_url" 
                                    value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=xxxxxxxxxxx">

                                @if ($errors->has('video_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('video_url') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Vídeo 
                        <div class="form-group row">
                            <label for="video" class="col-md-4 col-form-label text-md-right">{{__('Vídeo')}}</label>
                            <div class="col-md-8">
                                <input type="file" class="video" id="video" name="video" accept="video/*" onclick="desativaURL()">

                                @if ($errors->has('video'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('video') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        -->


                        <!-- Enviar -->
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
    <script src="{{ asset('js/pesquisarAreas.js') }}" defer></script>

</div>

@endsection
