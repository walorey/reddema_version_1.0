<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Image;
use App\Commentary;
use App\Report;
use Validator;
use App\Http\Requests\DeleteAsAdminRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserDeleted;
use App\Notifications\PostDeleted;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all()->count();
        $publicaciones = Post::all()->count();
        $imagenes = Image::all()->count();
        $comentarios = Commentary::all()->count();
        $reportesPendientes = Report::where('status', 0)->count();

        return view('admin.index')->with('usuarios', $usuarios)->with('publicaciones', $publicaciones)->with('imagenes', $imagenes)->with('comentarios', $comentarios)->with('reportesPendientes', $reportesPendientes);
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

    public function userIndex()
    {
        $usuarios = User::orderBy('id', 'DESC')->paginate(20);

        return view('admin.usuarios')->with('usuarios', $usuarios);
    }

    public function eliminarUsuario(DeleteAsAdminRequest $request, $id)
    {

        if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $request['password']]))
            return redirect()->back()->withErrors(['password' => ['La contraseña actual no coincide']]);

        $user = User::find($id);

        // dd($user->id,$admin->id);

        if ($user->id==Auth::user()->id){
            return redirect()->back()->with('rojo', 'No puedes eliminarte en el panel, si quieres desactivar tu cuenta ve a tu configuración');
            // $user->id == Auth::user()->id;
        }
        else{
            //notificar
            $user->notify(new UserDeleted($request->motivo));
            //eliminar
            $user->delete();
            //retornar
            return redirect()->route('users.index')->with('amarillo', 'Se ha eliminado al usuario: '.$user->name.' '.$user->lastname);
        }


    }

    public function verActividad($slug)
    {
        $usuario = User::where('slug' , '=' , $slug)->firstOrFail();
        $posts = Post::where('user_id', '=', $usuario->id)->orderBy('id', 'DESC')->paginate(10);
        $comentarios = Commentary::where('user_id', '=', $usuario->id)->orderBy('id', 'DESC')->paginate(10);
        $rHechos = Report::where('accuser_id', '=', $usuario->id)->orderBy('id', 'DESC')->paginate(10);
        $rRecibidos = Report::where('accused_id', '=', $usuario->id)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.actividadUsuario')->with('usuario', $usuario)->with('posts', $posts)->with('comentarios', $comentarios)->with('rHechos', $rHechos)->with('rRecibidos', $rRecibidos);
    }

    public function publicacionesIndex()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);

        return view('admin.publicaciones')->with('posts', $posts);
    }

    public function eliminarPublicacion(DeleteAsAdminRequest $request, $id)
    {
        //pruebo que el autenticado sea un admin:

        if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $request['password']]))
            return redirect()->back()->withErrors(['password' => ['La contraseña actual no coincide']]);

        $post = Post::find($id);

        $user = User::find($post->user->id);

        //notifico al usuario

        $user->notify(new PostDeleted($post->title,$request->motivo, $user));

        //borro la publicación

        $post->delete();

        //redirijo a la seccion publicaciones para informar que se borro correctamente

        return redirect()->route('admin.posts.index')->with('amarillo', 'Se ha eliminado la publicación: '.$post->title);
    }

    public function buscarPost(Request $request)
    {
        $title = $request->busqueda;
        $description = $request->busqueda;
        $busqueda = $request->busqueda;

        $posts = Post::orderBy('id', 'DESC')->title($title)->description($description)->paginate(1);

        return view('admin.publicaciones')->with('posts', $posts)->with('title', $title)->with('description', $description);
    }

    public function buscarUser(Request $request)
    {
        $name = $request->busqueda;
        $lastname = $request->busqueda;
        $email = $request->busqueda;
        $busqueda = $request->busqueda;

        $usuarios = User::orderBy('id', 'DESC')->name($name)->lastName($lastname)->email($email)->paginate(1);

        return view('admin.usuarios')->with('usuarios', $usuarios)->with('name', $name)->with('lastname', $lastname)->with('email', $email)->with('busqueda', $busqueda);
    }
}
