<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Metodologia;
use App\Model\AreaAtuacao;
use App\Model\Avaliacao;
use App\Model\AreaConhecimento;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Notifications\MetodologiaNotification;


class BuscarController extends Controller
{
    public function __construct()
    {
        //Define que somente usuários cadastrados e que estejam logados acessem o sistema
        $this->middleware('auth');
        $this->middleware('registro');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Chama o formulário
        $area_atuacaos = AreaAtuacao::all();
        $areas_conhecimento = AreaConhecimento::all();
        $metodologias = Metodologia::get();
        return view('Metodos.form', compact('metodologias', 'area_atuacaos', 'areas_conhecimento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //Valida os dados
                $request->validate([
                    "titulo" => "required|max:255",
                    "metodo" => "required",
                    "materiais" => "required",
                    "palavras_chave" => "required",
                    "area_atuacao" => 'required',
                    "area_conhecimento" => 'required',
                ]);

                if ($request->get('video_url') == NULL && $request->file('video') == NULL) {
                    $extensao = NULL;
                    $url = null;
                } else if ($request->get('video_url') != NULL) {
                    $extensao = NULL;
                    if(strpos($request->get('video_url'), "youtu.be/")){
                        $pos = strpos($request->get('video_url'), "youtu.be/");
                        $url = substr($request->get('video_url'), $pos + 9, 11);
                    }else{
                        $pos = strpos($request->get('video_url'), "watch?v=");
                        $url = substr($request->get('video_url'), $pos + 8, 11);
                    }
                } else {
                    $extensao = $request->file('video')->getClientOriginalExtension();
                    $url = null;
                }
                $area = $this->checarAreaAtuacao($request->get("area_atuacao"));

                if ($pos == null) {
                    return back()->withInput()->with("error", "Digite uma URL do YouTube no formato: \n https://www.youtube.com/watch?v=xxxxxxxxxxx !");
                }

                if (Is_String($area)) {
                    return back()->withInput()->with("error", $area);
                }

                if(auth()->user()->is_admin){
                    $req = false;
                }else{
                    $req = true;
                }

                //Adiciona no BD
                $metodologia = new Metodologia([
                    'titulo' => $request->get('titulo'),
                    'materiais' => $request->get('materiais'),
                    'metodo' => $request->get('metodo'),
                    'palavras_chave' => $request->get('palavras_chave'),

                    //Pega o nome do usuário atual:
                    'autor' => auth()->user()->nome,
                    //
                    'avaliacao' => null,
                    'area_atuacao' => $area->id,
                    'area_conhecimento' => $request->get('area_conhecimento'),
                    'video' => $extensao,
                    'video_url' => $url,
                    'is_requisicao' => $req,        
                ]);
                $metodologia->save();
                
                /*
                $admins = User::where('is_admin', 1)->get();
                foreach($admins as $admin){
                    $admin->notify(new MetodologiaNotification($admin));
                }
                */
                
                if ($extensao != NULL) {
                    $request->file('video')->move(public_path('video'), $metodologia->id . "." . $extensao);
                }
                return redirect('/home')->with('success', 'A metodologia foi requisitada com sucesso!');
    }

    private function checarAreaAtuacao($area)
    {
        if (AreaAtuacao::where("nome", $area)->first() != NULL) {
            $area = AreaAtuacao::where("nome", $area)->first();
            return $area;
        } else {
            return "A Área de Atuação selecionada não existe";
        }
    }
}
