<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Avaliacao;
use App\Model\Metodologia;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Adiciona no BD


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //Salva a avaliação realizada no BD de Avaliacao
        $valor = "avaliacao_".$id;
        $metodologia_id = "metodologia_".$id;
        $avaliacao = new Avaliacao([
            'avaliacao' => $request->get($valor),
            'metodologia_id' => $request->get($metodologia_id),
            'user_id' => auth()->user()->id,

        ]);
        $avaliacao->save();
        
        //Salva a avaliacao no BD de Metodologia
        $metodologia = Metodologia::findOrFail($request->get($metodologia_id));
        
        $avaliacao_media = Avaliacao::selectRaw('AVG(avaliacao) media')
             ->groupBy('metodologia_id')
             ->where('metodologia_id', $request->get($metodologia_id))
             ->get()->first();
        $metodologia->avaliacao = $avaliacao_media['media'];
        $metodologia->save();
        
        //echo $avaliacao_media[$request->get($metodologia_id)]['media'];
        return redirect('/home')->with('success', 'Avaliação realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
