<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ReportResolved;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reportes =Report::all();

        $pendientes = Report::where('status', 0)->orderBy('id', 'DESC')->paginate(20);
        $resueltos = Report::where('status', 1)->orderBy('id', 'DESC')->paginate(20);

        return view('admin.reportes')->with('pendientes', $pendientes)->with('resueltos', $resueltos);
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Request $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $report)
    {
        //
    }

    public function report(ReportRequest $request, $id)
    {
        $post = Post::find($id);

        $acusado = User::find($post->user->id);

        $report = new Report($request->all());
        $report->accuser_id = Auth::User()->id;
        $report->accused_id = $acusado->id;
        $report->ruta = route('posts.show', $post->id);

        $report->save();

        return back()->with('reporteEnviado', 'Recibimos tu reporte y lo analizaremos. Gracias por ayudar a mantener el orden de Reddema!');
    }

    public function reportarPerfil(ReportRequest $request, $id)
    {
        $acusado = User::find($id);

        $report = new Report($request->all());
        $report->accuser_id = Auth::User()->id;
        $report->accused_id = $acusado->id;
        $report->ruta = route('mostrar.perfil', $acusado->slug);

        $report->save();

        return back()->with('reporteEnviado', 'Recibimos tu reporte y lo analizaremos. Gracias por ayudar a mantener el orden de Reddema!');
    }

    public function resolver(Request $request, $id)
    {

        $reporte = Report::find($id);

        $reporte->status = true;

        $solucion = $request->solucion;

        $reporte->resultado = $solucion;

        $acusador = $reporte->accuser;

        $acusador->notify(new ReportResolved($reporte, $solucion));

        $reporte->save();

        return redirect()->route('reports.index')->with('mensaje', 'Reporte actualizado!');

    }
}
