<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Metodologia;

class MetodologiaAdminController extends Controller
{

    public function __construct()
    {
        //Define que somente usuários cadastrados, que estejam logados e que são admins acessem o sistema
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('registro');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorna todas as metodologias que estão sendo requisitadas para acessar o sistema
        $metodologias = Metodologia::where("is_requisicao", 1)->get();
        return view('Admin.metodologias', compact('metodologias')); 
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
        //Atualiza uma requisição para poder aparecer a todos os usuários
        $metodologia = Metodologia::findOrFail($id);
        $metodologia->is_requisicao = 0;
        $metodologia->save();
        return redirect('/requisicao_metodologia')->with('success', 'Metodologia inserida no sistema com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Apaga uma requisição de metodologia do sistema
        $metodologia = Metodologia::findOrFail($id);
        $metodologia->delete();
        return redirect('/home')->with('success', 'Metodologia removida com sucesso!');

    }
}
