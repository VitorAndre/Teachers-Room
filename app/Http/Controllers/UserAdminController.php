<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserAdminController extends Controller
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
        //Retorna todos os usuários não cadastrados
        $users = User::where("is_registered", 0)->get();
        return view('Admin.usuarios', compact('users')); 
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
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Metodos.matricula', compact('id')); 

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
        //Autoriza um usuário a acessar o sistema
        $user = User::findOrFail($id);
        $user->is_registered = 1;
        $user->save();
        return redirect('/requisicao_usuarios')->with('success', 'Usuário inserido com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Exclui um usuário da lista de requisições de usuários
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/requisicao_usuarios')->with('success', 'User removido com sucesso!');
    }
}
