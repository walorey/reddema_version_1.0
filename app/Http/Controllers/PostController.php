<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;
use App\Post;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\PostRequest;
use Validator;
use App\Commentary;
// use App\Notification;
use App\Notifications\NewComment;
use App\Notifications\someoneCommented;
use Barryvdh\DomPDF\Facade as PDF;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        $zones = Zone::all();

        return view('posts.index')->with('posts', $posts)->with('zones', $zones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        return view('posts.crearPublicacion')->with('zones', $zones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        // $messages = [
        //     'images.*.image' =>'Solo puede subir archivos del tipo imagen'
        // ];

        // $validator = Validator::make($request->all(), [
        //     'images.*' => 'image',
        // ], $messages);

        // if ($validator->fails()) {
        //      return redirect()->back()->withErrors($validator);
        // }


        $post = new Post($request->all());
        $post->user_id = Auth::User()->id;
        $post->zone_id = $request->zone;
        $post->slug = time().'-'.Str_slug($post->title);
        $post->save();


        if($request->hasFile('images')){

            foreach ($request->file('images') as $imagen) {
                $ruta = Storage::disk('public')->put('img/publicaciones', $imagen);
                $nuevaImagen = new Image;
                $nuevaImagen->ruta = $ruta;
                $nuevaImagen->post_id = $post->id;
                $nuevaImagen->save();
            }
        }





        return redirect()->route('home')->with('verde', 'Se ha creado tu publicación');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();

        return view('posts.publicacion')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $zones = Zone::all();

        if ($post->user->id == Auth::User()->id) {

            return view('posts.editar-post')->with('post', $post)->with('zones', $zones);
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {   $post = Post::find($id);
        $post->title = $request->title;
        $post->category = $request->category;
        $post->animal_type = $request->animal_type;
        $post->zone_id = $request->zone;
        $post->description = $request->description;
        $post->save();

        if($request->hasFile('images')){

            foreach ($request->file('images') as $imagen) {
                $ruta = Storage::disk('public')->put('img/publicaciones', $imagen);
                $nuevaImagen = new Image;
                $nuevaImagen->ruta = $ruta;
                $nuevaImagen->post_id = $post->id;
                $nuevaImagen->save();
            }
        }


        return redirect()->route('posts.show', $post->slug)->with('verde', 'Se ha actualizado su publicación');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $post->delete();

        return redirect()->route('home')->with('amarillo', 'Se ha eliminado la publicacion');
    }

    public function filtrar(Request $request)
    {
        $busqueda = $request->busqueda;
        $category = $request->category;
        $animal_type = $request->animal_type;
        $zone = $request->zone;

        $posts = Post::orderBy('id', 'DESC')->title($busqueda)->description($busqueda)->category($category)->animaltype($animal_type)->zone($zone)->paginate(1);

        $zones = Zone::all();

        return view('posts.index')->with('posts', $posts)->with('zones', $zones)->with('zone', $zone)->with('category', $category)->with('animal_type', $animal_type)->with('busqueda', $busqueda);

    }

    // public function buscar(Request $request)
    // {
    //     $busqueda = $request->busqueda;
    //     $zones = Zone::all();

    //     $posts = Post::orderBy('id', 'DESC')->title($busqueda)->description($busqueda)->paginate(1);

    //     return view('posts.index')->with('posts', $posts)->with('zones', $zones)->with('busqueda', $busqueda);
    // }

    public function verZona($name, $id)
    {
        $zone = $id;

        $posts = Post::orderBy('id', 'DESC')->zone($zone)->paginate(10);
        $zones = Zone::all();

        return view('posts.index')->with('posts', $posts)->with('zones', $zones)->with('zone', $zone);

    }

    public function verCategoria($name)
    {
        $category = $name;

        $posts = Post::orderBy('id', 'DESC')->category($category)->paginate(10);
        $zones = Zone::all();

        return view('posts.index')->with('posts', $posts)->with('zones', $zones)->with('category', $category);

    }

    public function verTipoAnimal($type)
    {
        $animal_type = $type;

        $posts = Post::orderBy('id', 'DESC')->animaltype($animal_type)->paginate(10);
        $zones = Zone::all();

        return view('posts.index')->with('posts', $posts)->with('zones', $zones)->with('animal_type', $animal_type);

    }

    public function comentar(Request $request, $id)
    {

        $comentario = New Commentary($request->all());
        $comentario->user_id = Auth::User()->id;
        $comentario->post_id = $id;
        $comentario->save();

        $post = Post::find($id);
        $comentaristas = $post->comments()->with('user')->get()->pluck('user')->unique();
        $elquepublico = User::find($post->user->id);

        if (Auth::User()->id !== $elquepublico->id) {
           $elquepublico->notify(new NewComment($comentario));
        }

        foreach ($comentaristas as $usuario) {
            if ($usuario->id !== Auth::User()->id && $usuario->id !== $elquepublico->id) {
                $usuario->notify(new someoneCommented($comentario));
            }
        }


        $mensaje = "¡Su comentario ha sido enviado!";

        // return view('posts.publicacion')->with('post', $post)->with('mensaje', $mensaje);

        return redirect()->route('posts.show' ,$post->slug)->with('comentarioEnviado', '¡Su comentario ha sido enviado!');

    }

    public function exportar($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $pdf = PDF::loadView('posts.exportar-como-pdf', compact('post'));
        return $pdf->download($post->title.'.pdf');
    }

}
