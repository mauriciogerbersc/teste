<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dvds;
use App\Dvds_legendas;

class LocadoraController extends Controller {

    public function index(){

        $dvdsListados = Dvds::all();

        return view('/locadora/index', compact('dvdsListados'));
    }

    public function listar()
    {
        return view('listar');
    }

    public static function listarPost(Request $request){
        
        $input = $request->all();
        $legenda = Dvds_legendas::where('dvds_id', '=', $input['id_dvd'])
                                    ->join('legendas', 'id_legenda', '=', 'legendas_id')
                                    ->select('legendas.lingua')
                                    ->get();
       $arr = array();
        foreach($legenda as $key=>$val){
             $arr['lingua'][] = $val['lingua'];
       }
        if (isset($input)) {
            return response()->json(['success' => true, 'legenda' => $arr]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}