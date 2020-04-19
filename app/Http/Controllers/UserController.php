<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditarPerfilRequest;
use App\Http\Requests\ConfigEmailRequest;
use App\Http\Requests\ConfigContraRequest;
use App\Http\Requests\BorrarCuentaRequest;

class UserController extends Controller
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
        dd('llego');
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

    public function configuracion()
    {
        return view('users.configuracion');
    }

    public function editarPerfil()
    {
        return view('users.editarPerfil');
    }

    public function verPerfil($slug)
    {
        $usuario = User::where('slug', '=', $slug)->firstOrFail();
        $posts = Post::where('user_id', $usuario->id)->orderBy('id', 'DESC')->paginate(10);

        return view('users.perfil')->with('usuario', $usuario)->with('posts', $posts);
    }

    public function actualizarPerfil(EditarPerfilRequest $request)
    {
        $usuario = Auth::user();

        if ($request->hasFile('avatar')) {
            $ruta = Storage::disk('public')->put('img/avatares', $request->file('avatar'));
            $usuario->avatar = $ruta;
        }


        $usuario->descripcion = $request->descripcion;

        $usuario->save();

        return redirect()->route('editar.perfil')->with('verde', '¡Perfil modificado!');
    }

    public function cambiarEmail(ConfigEmailRequest $request)
    {
        $emailNuevo = $request->email;
        $password_actual = $request->password_actual;
        $usuario = Auth::user();

        if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $password_actual])) {
            return redirect()->route('config')->with('rojo', 'La contraseña actual no es correcta');
        }
        else
        {
            $usuario->email = $emailNuevo;
            $usuario->email_verified_at = NULL;
            $usuario->save();
            $usuario->sendEmailVerificationNotification();
            return redirect()->route('config')->with('verde', 'Se cambio el email correctamente, verifiquelo para tener acceso a la página.');
        }
    }

    public function cambiarContra(ConfigContraRequest $request)
    {
        $password_actual = $request->password_actual;
        $usuario = Auth::user();

        if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $password_actual])) {
            return redirect()->route('config')->with('rojo', 'La contraseña actual no es correcta');
        }
        else
        {
            $usuario->password = bcrypt($request->password);
            $usuario->save();
            return redirect()->route('config')->with('verde', 'Se cambio la contraseña correctamente');
        }
    }

    public function borrarCuenta(BorrarCuentaRequest $request)
    {

    }
}
