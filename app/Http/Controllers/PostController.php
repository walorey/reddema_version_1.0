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

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
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





        echo "Publicacion guardada!";

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
