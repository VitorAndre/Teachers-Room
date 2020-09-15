<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Metodologia;
use App\Model\Avaliacao;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Define que somente usuários registrados e que estejam logados acessem este controller
        $this->middleware('auth');
        $this->middleware('registro');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Retorna uma view com todas as metodologias que não são requisição    
        $metodologias = Metodologia::where("is_requisicao", 0)->get();
        $avaliacao = Avaliacao::selectRaw('AVG(avaliacao) media')
            ->groupBy('metodologia_id')
            ->get();

        $avaliaca = Avaliacao::where('user_id', auth()->user()->id)->get();
        $avaliacoes_realizadas = [];
        foreach($avaliaca as $a){
            $avaliacoes_realizadas[] = $a->metodologia_id;
        }
        //var_dump($avaliacoes_realizadas);
        return view('Metodos.buscar', compact('metodologias', 'avaliacao', 'avaliacoes_realizadas')); 
    
    }
}
