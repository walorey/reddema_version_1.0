<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use App\User;
use App\Post;

class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('notifications.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications' => auth()->user()->readNotifications
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //este metodo le muestra a un usuario que su contenido fue eliminado, deberia cambiarle el nombre por que voy a mostrar otro tipo de notificaciones, como cuando se muestra un reporte resuelto
    public function show($id)
    {
        $notificacion = DatabaseNotification::find($id);

        if ($notificacion->data['user']['id'] == Auth::user()->id) {
            return view('notifications.objectDeleted')->with('notificacion', $notificacion);
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

    public function read($id)
    {
        DatabaseNotification::find($id)->markAsRead();

        // if (request()->ajax()) {
        //     return auth()->user()->unreadNotifications;
        // }

        return back()->with('flash', 'Notificacion marcada como leida');
    }

    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();

        // if (request()->ajax()) {
        //     return auth()->user()->unreadNotifications;
        // }

        return back()->with('flash', 'Notificacion eliminada');
    }

    public function reporteResuelto($id)
    {
        $notificacion = DatabaseNotification::find($id);

        if ($notificacion->data['user']['id'] == Auth::user()->id) {
            return view('notifications.reporteResuelto')->with('notificacion', $notificacion);
        }
        else{
            dd('no puedes ver esta notificacion');
            return redirect()->route('home');
        }
    }
}
