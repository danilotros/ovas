<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Entidad;
use App\Models\Idioma;
use App\Models\Nucleo;
use App\Models\Ova;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

/**
 * Clase encargarda de gestionar las funcionalidades del area administrativa
 *
 */
class AdministratorController extends Controller
{

    public function index()
    {
        /**
         * Devuelve la vista de login administrativo
         */
        return view('login');
    }
    public function getOva()
    {
        /**
         * funcion que retorna la vista de creacion de ovas
         * idiomas devulve a la vista informacion almacenada en la tabla de idiomas
         * areas devulve a la vista informacion almacenada en la tabla de areas
         * entidades devulve a la vista informacion almacenada en la tabla de entidades
         * nucleos devulve a la vista informacion almacenada en la tabla de nucleos
         */
        return view('administrador.crear-ova2')
            ->with('idiomas', Idioma::all())
            ->with('areas', Area::all())
            ->with('entidades', Entidad::all())
            ->with('nucleos', Nucleo::all());
    }
    public function crearOva(Request $request)
    {
        /**
         * Funcion que se usara para crear una ova
         * @param Request $request es el parametro que recibe los datos enviados por la vista de crear ovas
         * por metodo post
         *
         */
        $post = $request->input();
        $ova = new Ova();
        $ova->titulo = $post['titulo'];
        $ova->descripcion = $post['descripcion'];
        $ova->idioma = $post['idioma'];
        $ova->palabras_clave = $post['palabras'];
        $ova->autor = $post['autor'];
        $ova->entidad = $post['entidad'];
        $ova->version = $post['version'];
        $ova->fecha = Carbon::now();
        $ova->formato = $post['formato'];
        $ova->instrucciones = $post['instrucciones'];
        $ova->costo = $post['costo'];
        $ova->requerimientos = $post['requerimientos'];
        $ova->derechos = $post['derechos'];
        $ova->uso = $post['uso'];
        $ova->are_id = $post['area'];
        $ova->nuc_id = $post['nucleo'];
        if (!empty($_FILES['archivo']['name'])) {
            /**
             * funcion para subir un archivo dentro del servidor
             */
            $ruta = subirDocumento('archivo', 'ovas');
            $ova->archivo = $ruta;
        }
        $ova->use_id = 1;
        // $response = Http::withBody()->post('/ova',[
        //     'titulo' => 'Taylor',
        // ]);
        if ($ova->save()) {
            /**
             * @return response()->json(['']) devuelve un mensaje de exito a la vista para dirigirce a una
             * url
             */
            return response()->json(['msg' => 'Ova Guardada con exito', 'code' => 200, 'url' => '/ovas']);
        } else {

            /**
             * @return response()->json(['']) devuelve un mensaje de error a la vista
             */
            return response()->json(['msg' => 'Error al guardar', 'code' => 500]);
        }
    }

    public function login(Request $request)
    {
        /**
         * Funcion para realizar el logueo del administrador
         */
        $post = $request->input();

        $data = [
            'name' => $post['name'],
            'password' => $post['password'],
        ];
        /**
         * @param Auth es una funcion que crea las variables de session verificando si el nombre y la contraseña  con
         * algun usuario almacenado en la BD
         */
        if (Auth::attempt($data)) {
            /**
             * @return response()->json(['']) devuelve un mensaje de exito a la vista para dirigirce a una
             * url
             */
            return response()->json(['code' => 200, 'msg' => 'Se ha logeado con exito', 'url' => '/home']);
        } else {

            /**
             * @return response()->json(['']) devuelve un mensaje de error a la vista
             */
            return response()->json(['code' => 500, 'msg' => 'Datos errados']);
        }
    }

}
