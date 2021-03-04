<?php

namespace App\Http\Controllers;

use App\Models\Ova;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Funcion que retorna la vista del home
     */
    public function home()
    {
        return view('home');
    }
    /**
     * Funcion que muestra las ovas cargadas en la BD de acuerdo a la consulta realizada
     * @param are_id es el id del area enviada por ruta
     * @param Reques $request recibe los datos enviados por el buscador
     */
    public function chargeOvas(Request $request, $are_id = null)
    {

        $post = $request->input();
        /**
         * consulta de las ovas dependiendo del area o de la busqueda realizada por el usuario
         */
        $ova = DB::table('ovas')
            ->where(function ($query) use ($are_id) {
                if ($are_id != null) {
                    $query->where('are_id', $are_id);
                }
            })
            ->where(function ($query) use ($post) {
                if (isset($post['datos'])) {
                    if (!empty($post['datos'])) {
                        $query->orwhere('ovas.entidad', 'like', '%' . $post['datos'] . '%');
                        $query->orwhere('ovas.descripcion', 'like', '%' . $post['datos'] . '%');
                        $query->orwhere('ovas.palabras_clave', 'like', '%' . $post['datos'] . '%');
                        $query->orwhere('ovas.autor', 'like', '%' . $post['datos'] . '%');
                    }
                }
            })
            ->get();
        return view('ovas')->with('ovas', $ova);
    }
    /**
     * funcion que dirige a la vista de la ficha
     */

    public function fichaOva($id=null){
        $ova=Ova::find($id);
        return view('ficha')
        ->with('ova', $ova);
    }
}
