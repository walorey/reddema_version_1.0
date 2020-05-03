<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Conversation;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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

    //enviar mensaje desde perfil
    public function store(Request $request, $id)
    {
            $destinatario = User::find($id);
            $mensaje = new Message();
            $mensaje->body = $request->body;
            $mensaje->sender_id = Auth::user()->id;
            $mensaje->recipient_id = $id;
            $mensaje->save();

            return redirect()->route('mostrar.perfil', $destinatario->slug)->with('verde', 'Mensaje enviado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $usuario = User::where('slug', $slug)->firstOrFail();

        $mensajes = Message::where('sender_id', $usuario->id)->where('recipient_id', Auth::user()->id)->orWhere('recipient_id', $usuario->id)->where('sender_id', Auth::user()->id)->get();

        return view('users.conversacion')->with('usuario', $usuario)->with('mensajes', $mensajes);
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

    public function verBuzon()
    {

        //aca pido todos los mensajes en donde yo envio mensajes, con la fecha de creacion para ordenarlo despues
        $recipients = Message::Select('recipient_id', 'created_at')->distinct()->where('sender_id', Auth::user()->id)->get()->toArray();

        //aca pido todos los mensajes en los que yo recibo mensajes, con la fecha de creacion para ordenarlo despues
        $senders = Message::Select('sender_id' , 'created_at')->distinct()->where('recipient_id', Auth::user()->id)->get()->toArray();


        //aca hago un merge, junto los array en uno
        $merge = array_merge($recipients, $senders);

        if (count($merge)>0) {
            //aca hago de ese array una coleccion para poder ordenarlos aunque tengan atributos de distinto nombre
            $collection = collect($merge);

            // aca ordeno los mensajes por created_at de forma descendente, o sea ordeno los id de los usuarios con los que tuve interaccion mas reciente, aun estan repetidos
            $mensajesOrdenados = $collection->sortByDesc('created_at');

            // aca separo los id de la coleccion
            $ids = $mensajesOrdenados->map(function($item){return $item['sender_id'] ?? $item['recipient_id'];})->toArray();

            //aca fijo el ordenamiento de esos id
            $ids_ordenados = implode(',', $ids);

            //pido buscar usuarios, como es una cadena uso whereIn, pero le digo que conserve el orden y con where in no repite usuarios
            $users = User::whereIn('id', $ids)->orderByRaw("FIELD(id,$ids_ordenados)")->get();


            return view('users.buzon')->with('users', $users);
        }
        else{
            $aviso = "No hay mensajes";
            return view('users.buzon')->with('aviso', $aviso);
        }




    }

    // public function nuevoMensaje(Request $request, )
    // {

    // }
}
