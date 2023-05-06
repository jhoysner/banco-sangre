<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Prueba;
use App\Models\Donante;
use App\Models\Aprobacion;
use Illuminate\Http\Request;
use App\Models\PruebaDonante;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**UserController
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('can:usuarios.index')->only('index');
    }

    public function index()
    {   

        
        $data = User::all();

        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->turno = $request->turno;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->direccion = $request->direccion;
        $user->code_nomina = $request->code_nomina;
        $user->edad = $request->edad;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index', $user->id)->with('message', 'Se creo el personal correctamente');
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
        $data = User::find($id);

     

        return view('users.edit', compact('data'));
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
        // dd($request->all());
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->turno = $request->turno;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->direccion = $request->direccion;
        $user->code_nomina = $request->code_nomina;
        $user->edad = $request->edad;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect()->route('users.index')->with('message', 'Se edito el usario correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        if ($request->id != 1) {

            $data = User::find($request->id);
            $data->delete();

            Session::flash('message', 'Registro Eliminado');

            return redirect()->action([UserController::class, 'index']);
        }

        return back();
    }

    public function aprobacion(Request $request)
    {   

        $request->session()->forget('error');

        $donante = null;
        if($request->serial){
          
            $donante = Donante::where('serial', $request->serial)->first();

            if($donante == null)
            {
                Session::flash('error', 'Donante no encontrado');
            }
        
        }
        
        return view('aprobacion.index', compact('donante'));
    }

    public function aprobacionStore(Request $request)
    {   

        $date = Carbon::now()->format('Y-m-d');


        $aprobacion = new Aprobacion;
        $aprobacion->tipo_donacion = $request->tipo_donacion;
        $aprobacion->responsable_extraccion = $request->responsable_extraccion;
        $aprobacion->descartado_diferido = $request->descartado_diferido;
        $aprobacion->reaccion = $request->reaccion;
        $aprobacion->serologico_id = $request->serologico;
 
        $aprobacion->donante_id  = $request->donante;
        $aprobacion->fecha  = $date;
        $donante = null;

        $aprobacion->save();
        
        return redirect()->route('donante.serologico.historial', $request->donante)->with('message', 'Se creo el personal correctamente');
    }

    public function prueba(Request $request)
    {   

        $request->session()->forget('error');

        $donante = null;
        $preguntas = [];
        if($request->cedula){
          
            $donante = Donante::where('cedula', $request->cedula)->first();

            $preguntas = Prueba::all();


            if($donante == null)
            {
                Session::flash('error', 'Donante no encontrado');
            }
        
        }
        
        return view('prueba.index', compact('donante' , 'preguntas'));
    }


    public function pruebaStore(Request $request, $id)
    {       


        $date = Carbon::now()->format('Y-m-d');

        foreach ($request->except('_token')  as $key => $value) {

            $uh = new PruebaDonante;
            $uh->prueba_id = $key;
            $uh->respuesta = $value;
            $uh->donante_id = $id;
            $uh->fecha = $date;
            $uh->save();
        }
        
        $donante = null;
        $preguntas = [];

        return view('prueba.index',compact('donante'));
    }

    
}
