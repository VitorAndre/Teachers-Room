<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AreaAtuacao;
use App\Http\Resources\AreaAtuacaoCollection;
use Illuminate\Support\Facades\DB;


class AreaAtuacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Preenche o datalist com as opções referentes ao que o usuário digita
        $id = $_GET['id'];
		$area_atuacao = DB::table('area_atuacaos')->where("area_conhecimento_id","=", $id)->get();
        return new AreaAtuacaoCollection($area_atuacao);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($requisicao, $id)
    {
        
        
		$area_atuacao = DB::table('area_atuacaos')->where(["nome", 'like', '%'.$requisicao.'%'],["area_conhecimento_id","=", $id])->get();


        return new AreaAtuacaoCollection($area_atuacao);
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
        //
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
