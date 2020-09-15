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
                <th>Nome</th>
                <th>E-mail</th>
                <th>Matricula</th>
                <th>Tornar Administrador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->nome}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->matricula}}</td>
                <td>
                    <form method="POST" action="{{route('novo_admin.update', $user->id)}}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i></button>
                    </form>
                </td>
            </tr>
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
