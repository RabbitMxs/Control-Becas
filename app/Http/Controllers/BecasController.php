<?php

namespace App\Http\Controllers;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BecasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumnos::all();
        return view('index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = new Alumnos();
        $alumno->noControl = $request->get('noControl');
        $alumno->nombre = $request->get('nombre');
        $alumno->apellidos = $request->get('apellidos');
        $alumno->genero = $request->get('genero');
        $alumno->semestre = $request->get('semestre');
        $alumno->carrera = $request->get('carrera');
        $alumno->fechaNac = $request->get('fechaNac');
        $alumno->domicilio = $request->get('domicilio');
        $alumno->tipoBeca = $request->get('tipoBeca');

        /*if ($request->hasFile('carta')) {
            $carta = $request->file('carta');
            $cartaname = "carta_" . uniqid() . "." . $carta->getClientOriginalExtension();
            $alumno->carta = $cartaname;
            Storage::putFileAs('public/doc/cartas/', $carta, $cartaname);

            if ($request->hasFile('identificacion')) {
            $identificacion = $request->file('identificacion');
            $identificacionname = "identificacion_" . uniqid() . "." . $identificacion->getClientOriginalExtension();
            $alumno->identificacion = $identificacionname;
            Storage::putFileAs('public/doc/identificaciones/', $identificacion, $identificacionname);
        }

        if ($request->hasFile('compDomicilio')) {
            $compDomicilio = $request->file('compDomicilio');
            $filename = "compDomicilio_" . uniqid() . "." . $compDomicilio->getClientOriginalExtension();
            $alumno->compDomicilio = $filename;
            Storage::putFileAs('public/doc/comprobantesDomicilio/', $compDomicilio, $filename);
        }
        }*/

        if ($request->hasFile('carta')) {
            $carta = $request->file('carta');
            $cartaname = "carta_" . uniqid() . "." . $carta->getClientOriginalExtension();
            $alumno->carta = $cartaname;
            $path = $carta->storeAs('docs/cartas/', $cartaname, 's3');
            Storage::disk('s3')->setVisibility($path,  'public');
        }

        if ($request->hasFile('identificacion')) {
            $identificacion = $request->file('identificacion');
            $identificacionname = "identificacion_" . uniqid() . "." . $identificacion->getClientOriginalExtension();
            $alumno->identificacion = $identificacionname;
            $path = $identificacion->storeAs('docs/identificaciones/', $identificacionname, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
        }

        if ($request->hasFile('compDomicilio')) {
            $compDomicilio = $request->file('compDomicilio');
            $filename = "comprobante_" . uniqid() . "." . $compDomicilio->getClientOriginalExtension();
            $alumno->compDomicilio = $filename;
            $path = $compDomicilio->storeAs('docs/comprobantesDomicilio/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
        }
        $alumno->created_at = date('Y-m-d H:i:s');
        $alumno->updated_at = date('Y-m-d H:i:s');
        $alumno->save();
        return redirect('becas')->with('success', 'Beca solicitada exitosamente');
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
