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
        $mensajes = Message::where('sender_id', '=' , Auth::user()->id)->where('recipient_id', '=', $id)->orwhere('recipient_id', '=', Auth::user()->id)->where('sender_id', '=', $id)->get();

        $remitente = Auth::user();
        $destinatario = User::find($id);
        $slugConversacion = $remitente->name.$remitente->lastname.'-'.$destinatario->name.$destinatario->lastname;

        if ($mensajes->count() == 0) {
            $conversacion = new Conversation();
            $conversacion->slug = time().'-'.Str_slug($slugConversacion);
            $conversacion->save();
            $mensaje = new Message();
            $mensaje->conversation_id = $conversacion->id;
            $mensaje->sender_id = Auth::user()->id;
            $mensaje->recipient_id = $id;
            $mensaje->body = $request->body;
            $mensaje->save();


            dd('conversacion nueva y mensaje enviado');
        }
        else
        {
            $mensaje = new Message();
            $mensaje->conversation_id = $mensajes->first()->conversation_id;
            $mensaje->body = $request->body;
            $mensaje->sender_id = Auth::user()->id;
            $mensaje->recipient_id = $id;
            $mensaje->save();

            dd('mensaje enviado');
        }


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
