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
        $post->save();


        if($request->hasFile('images')){

            foreach ($request->file('images') as $imagen) {
                $ruta = Storage::put('public',$imagen);
                $nuevaImagen = new Image;
                $nuevaImagen->ruta = $ruta;
                $nuevaImagen->post_id = $post->id;
                $nuevaImagen->save();
            }

            //no puedo guardar multiples imagenes, una si.

        }





        return redirect()->route('index.post')->with('mensaje', 'Se ha creado tu publicación');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.publicacion')->with('post', $post);
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

    public function filtrar(Request $request)
    {
        $category = $request->category;
        $animal_type = $request->animal_type;
        $zone = $request->zone;

        $posts = Post::orderBy('id', 'DESC')->category($category)->animaltype($animal_type)->zone($zone)->paginate(10);
        $zones = Zone::all();

        return view('posts.index')->with('posts', $posts)->with('zones', $zones)->with('zone', $zone)->with('category', $category)->with('animal_type', $animal_type);

    }

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

        $user = User::find($post->user->id);
        if (Auth::User()->id !== $user->id) {
           $user->notify(new NewComment($comentario));
        }



        // $notificacion = New Notification;
        // $notificacion->addressee_user_id = $post->user->id;
        // $notificacion->generator_user_id = Auth::User()->id;
        // $notificacion->post_id = $post->id;
        // $notificacion->save();

        $mensaje = "¡Su comentario ha sido enviado!";

        // return view('posts.publicacion')->with('post', $post)->with('mensaje', $mensaje);

        return redirect()->route('posts.show' ,$id)->with('mensaje', '¡Su comentario ha sido enviado!');

    }

}
