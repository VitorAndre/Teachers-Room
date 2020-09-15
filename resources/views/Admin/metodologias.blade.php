@extends('layouts.app')

@section('content')
<link href="{{ asset('css/estilo_buscar.css') }}" rel="stylesheet">

<section>
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success')}}
    </div><br />
    @endif
    <table id="table_id" class="display flex-center buscar">
        <thead class="text-dark">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Área de Atuação</th>
                <th>Aceitar</th>
                <th>Recusar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metodologias as $metodologia)
            <tr data-toggle="modal" data-target="#ModalLongo{{$metodologia->id}}">
                <td>{{$metodologia->titulo}}</td>
                <td>Profº {{$metodologia->autor}}</td>
                <td>{{$metodologia->areaAtuacao->nome}}</td>
                <td>
                    <form method="POST" action="{{route('requisicao_metodologia.update', $metodologia->id)}}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i></button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('requisicao_metodologia.destroy', $metodologia->id)}}" onSubmit="if(!confirm('Tem certeza?')){return false;}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="ModalLongo{{$metodologia->id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalLongo">{{$metodologia->titulo}}</h5>
                            <button type="button" class="close fechar" data-dismiss="modal" aria-label="Fechar" onclick="Para()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <b>Professor(a)</b> {{$metodologia->autor}}
                            </div>
                            <div>
                                <b>Área do conhecimento:</b>
                                {{$metodologia->areaConhecimento->nome}}
                            </div>
                            <div>
                                <b>Área de Atuação:</b>
                                {{$metodologia->areaAtuacao->nome}}
                            </div>
                            <div>
                                <b>Materiais:</b><br>
                                {{$metodologia->materiais}}
                            </div>
                            <div>
                                <b>Método:</b>
                                {{$metodologia->metodo}}
                            </div>
                            <br>
                            <div>
                                <b>Palavras-chave:</b> <br> 
                                {{$metodologia->palavras_chave}}
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
                                <iframe width="465" height="315" id="frame" src="https://www.youtube.com/embed/{{$metodologia->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @endif
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
            @endforeach
        </tbody>
    </table>
</section>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $.noConflict();
        $('#table_id').DataTable({
            "language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"},
            "lengthChange": false,
            "pageLength": 15,
            "info": false,
            "dom":"ftip",
            responsive: true
        });
    });
</script>
@endpush
