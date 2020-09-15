@extends('layouts.app')

@section('content')
@push('page')
	active
@endpush
<section id="pag_buscar">
    <link href="{{ asset('css/estilo_avaliacao.css') }}" rel="stylesheet">
	<link href="{{ asset('css/estilo_buscar.css') }}" rel="stylesheet">
	
    @if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success')}}
		</div>
    @endif
    
    <table id="tabela" class="display flex-center buscar">
        <thead class="text-dark">
            <tr>
                <th>Título</th>
                <th id="cel">Área de Atuação</th>
                <th>Assunto</th>
                <th>Avaliação</th>
                @if(Auth::user()->is_admin == 1)
                    <th>Excluir</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($metodologias as $metodologia)
            <tr data-toggle="modal" data-target="#ModalLongo{{$metodologia->id}}">
                <td>{{$metodologia->titulo}}</td>
                <td id="cel">{{$metodologia->areaAtuacao->nome}}</td>
                <td>{{$metodologia->palavras_chave}}
                    <p class="nao-visivel"> 
                            {{$metodologia->materiais}} /
                            {{$metodologia->metodo}} /
                            {{$metodologia->autor}} /
                            {{$metodologia->areaAtuacao->nome}} /
                            {{$metodologia->areaConhecimento->nome}} /
                    </p>
                </td>
                <td> 
                @if($metodologia->avaliacao != null)
                    {{number_format($metodologia->avaliacao, 2, '.', '')}}
					<i class="fa fa-star"></i>
				@endif
                </td>
                
                @if(Auth::user()->is_admin == 1)
					<td>
						<form method="POST" action="{{ route('requisicao_metodologia.destroy', $metodologia->id)}}" onSubmit="if(!confirm('Tem certeza?')){return false;}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit" id="excluir"><i class="fa fa-close"></i></button>
						</form>
                    </td>
                @endif

            </tr>

            @endforeach
        </tbody>
    </table>

    @foreach($metodologias as $metodologia)
        <div class="modal fade" id="ModalLongo{{$metodologia->id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalLongo">{{$metodologia->titulo}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div>
                            <b>Professor(a): </b>{{$metodologia->autor}}
                        </div>
                        <div>
                            <b>Área do conhecimento: </b>{{$metodologia->areaConhecimento->nome}}
                        </div>
                        <div>
                            <b>Área de Atuação: </b>{{$metodologia->areaAtuacao->nome}}
                        </div>
                        <div>
                            <b>Materiais: </b>{{$metodologia->materiais}}
                        </div>
                        <div>
                            <b>Método: </b>{{$metodologia->metodo}}
                        </div>
                        <br>
                        <div>
                            <b>Palavras-chave: </b>{{$metodologia->palavras_chave}}
                        </div>
                        <div>
                            @if($metodologia->video != NULL)
                            <video width="320" height="240" controls>
                                <source src="video/{{$metodologia->id}}.{{$metodologia->video}}" type="video/{{$metodologia->video}}">
                                Seu navegador não suporta tags de vídeo.
                            </video>
                            @endif
                            @if($metodologia->video_url != NULL)

                            <b>Vídeo:</b> <br>
                            <iframe width="465" height="315" src="https://www.youtube.com/embed/{{$metodologia->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        </div>
                    </div>
                    @if(in_array($metodologia->id, $avaliacoes_realizadas))

                    @else
                    <div class="modal-footer">
                        <form method="POST" action="{{route('avaliacao.update', $metodologia->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!-- Título -->
                            <input id="metodologia_{{$metodologia->id}}" type="hidden" name="metodologia_{{$metodologia->id}}" value="{{$metodologia->id}}" required autofocus>
                            
                            <!-- Enviar -->
                            <div class="form-group row mb-0">
								<div class="">
									<fieldset class="rating">
										<input type="radio" id="star5_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="5" /><label class = "full" for="star5_{{$metodologia->id}}" title="Excelente!"></label>
										<input type="radio" id="star4half_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="4.5" /><label class="half" for="star4half_{{$metodologia->id}}" title="Ótimo!"></label>
										<input type="radio" id="star4_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="4" /><label class = "full" for="star4_{{$metodologia->id}}" title="Muito bom!"></label>
										<input type="radio" id="star3half_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="3.5" /><label class="half" for="star3half_{{$metodologia->id}}" title="Bom"></label>
										<input type="radio" id="star3_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="3" /><label class = "full" for="star3_{{$metodologia->id}}" title="Regular"></label>
										<input type="radio" id="star2half_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="2.5" /><label class="half" for="star2half_{{$metodologia->id}}" title="Mediano"></label>
										<input type="radio" id="star2_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="2" /><label class = "full" for="star2_{{$metodologia->id}}" title="Ruim"></label>
										<input type="radio" id="star1half_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="1.5" /><label class="half" for="star1half_{{$metodologia->id}}" title="Muito Ruim"></label>
										<input type="radio" id="star1_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="1" /><label class = "full" for="star1_{{$metodologia->id}}" title="Péssimo"></label>
										<input type="radio" id="starhalf_{{$metodologia->id}}" name="avaliacao_{{$metodologia->id}}" value="0.5" /><label class="half" for="starhalf_{{$metodologia->id}}" title="Terrível"></label>
									</fieldset>
								</div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 col-12 d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</section>
@endsection


@push('script')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $.noConflict();
        $('#tabela').DataTable({
            "language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"},
            "lengthChange": false,
            "pageLength": 12,
            "info": false,
            "dom":"ftip"
        });
    });
</script>
@endpush