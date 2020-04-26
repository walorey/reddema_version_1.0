<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newConversation;

class ConversationController extends Controller
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
    public function store(Request $request, $id)
    {
        $destinatario = User::find($id);
        $remitente = Auth::user();
        $conversacion = new Conversation();
        $conversacion->subject = $request->subject;
        $conversacion->remitente_id = $remitente->id;
        $conversacion->destinatario_id = $destinatario->id;
        $titulo_conver_slug = $remitente->name.$remitente->lastname.$destinatario->name.$destinatario->lastname;
        $conversacion->slug = time().'-'.Str_slug($titulo_conver_slug);
        $conversacion->save();

        $mensaje = new Message();
        $mensaje->conversation_id = $conversacion->id;
        $mensaje->sender_id = $remitente->id;;
        $mensaje->recipient_id = $destinatario->id;
        $mensaje->body = $request->body;
        $mensaje->save();

        $destinatario->notify(new newConversation($remitente, $conversacion));


        dd('Conversacion enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $conversacion = Conversation::where('slug', '=', $slug)->firstOrFail();

        if (Auth::user()->id == $conversacion->remitente_id || Auth::user()->id == $conversacion->destinatario_id) {
            return view('users.conversacion')->with('conversacion', $conversacion);
        }
        else{
            return redirect()->route('home');
        }
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
