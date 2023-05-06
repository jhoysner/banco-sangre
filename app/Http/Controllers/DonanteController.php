<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Donante;
use App\Models\Historia;
use App\Models\Aprobacion;
use App\Models\Serologico;
use App\Models\HistoriaUser;
use Illuminate\Http\Request;
use App\Models\PruebaDonante;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DonanteController extends Controller
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
        $data = Donante::all();

        return view('donante.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donante.create');
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
        $donante = new Donante;
        $donante->nombres = $request->nombres;
        $donante->email = $request->email;
        $donante->telefono = $request->telefono;
        $donante->tipo_donacion = $request->tipo_donacion;
        $donante->fecha_nacimiento = $request->fecha_nacimiento;
        $donante->fecha_donacion = $request->fecha_donacion;
        $donante->direccion = $request->direccion;
        $donante->serial = $request->serial;
        $donante->edad = $request->edad;
        $donante->apellidos = $request->apellidos;
        $donante->lugar_nacimiento = $request->lugar_nacimiento;
        $donante->nombre_paciente = $request->nombre_paciente;
        $donante->profesion = $request->profesion;
        $donante->direccion_trabajo = $request->direccion_trabajo;
        $donante->cedula = $request->cedula;
        $donante->save();

        return redirect()->route('donante.index', $donante->id)->with('message', 'Se creo el personal correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHistoria($id)
    {
        //
        $userHistoria = HistoriaUser::where('donante_id',$id)->groupBy('fecha')->get();
        return view('historia.historiaHistorial', compact('userHistoria', 'id'));
    }
    public function historia($id)
    {   
        $donante = Donante::find($id);
        $preguntas = Historia::all();
        return view('historia.historia', compact('preguntas', 'donante'));
    }

    public function historiaShow($fecha ,$id)
    {   
        $donante = Donante::find($id);
        $preguntas = Historia::all();

        $respuestas =HistoriaUser::where('donante_id',$id)->where('fecha', $fecha)->get();
        // "pregunta_id" => 1
        return view('historia.showHistoria', compact('preguntas', 'donante', 'fecha' , 'respuestas'));
    }

    public function historiaStore(Request $request, $id)
    {      

        $date = Carbon::now()->format('Y-m-d');

        foreach ($request->except('_token')  as $key => $value) {

            $uh = new HistoriaUser;
            $uh->pregunta_id = $key;
            $uh->respuesta = $value;
            $uh->donante_id = $id;
            $uh->fecha = $date;
            $uh->save();
        }


        return redirect()->route('donante.historia', $id)->with('message', 'Se creo el personal correctamente');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Donante::find($id);

        return view('donante.edit', compact('data'));
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
        $donante = Donante::find($id);
        $donante->nombres = $request->nombres;
        $donante->email = $request->email;
        $donante->telefono = $request->telefono;
        $donante->tipo_donacion = $request->tipo_donacion;
        $donante->fecha_nacimiento = $request->fecha_nacimiento;
        $donante->fecha_donacion = $request->fecha_donacion;
        $donante->direccion = $request->direccion;
        $donante->serial = $request->serial;
        $donante->edad = $request->edad;
        $donante->apellidos = $request->apellidos;
        $donante->lugar_nacimiento = $request->lugar_nacimiento;
        $donante->nombre_paciente = $request->nombre_paciente;
        $donante->profesion = $request->profesion;
        $donante->direccion_trabajo = $request->direccion_trabajo;
        $donante->cedula = $request->cedula;
        $donante->save();
        return redirect()->route('donante.index')->with('message', 'Se edito el usario correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {


        $data = Donante::find($request->id);
        $data->delete();

        Session::flash('message', 'Registro Eliminado');

        return redirect()->action([DonanteController::class, 'index']);
        

        return back();
    }



    public function showSerologico($id)
    {
        $userSerologico = Serologico::where('donante_id',$id)->orderBy('id', 'DESC')->get();
        return view('serologico.historial', compact('userSerologico', 'id'));
    }
    public function serologico($id)
    {   
        $donante = Donante::find($id);
        $preguntas = Serologico::all();
        return view('serologico.serologico', compact('preguntas', 'donante'));
    }

    public function serologicoShow($code, $id)
    {
        $donante = Donante::find($id);


        $aprobacion = Aprobacion::where('serologico_id', $code)->first();

        if($aprobacion){
            $aprobacionTrue = true;
            
        }
        else{
            
            $aprobacionTrue = false;
            $aprobacion = null;
        }
        $serologico =   Serologico::where('donante_id',$id)->where('id', $code)->first();

        return view('serologico.showSerologico', compact('serologico', 'donante', 'code', 'aprobacionTrue','aprobacion'));
    }

    public function serologicoStore(Request $request, $id)
    {
        
        $date = Carbon::now()->format('Y-m-d');
        $se = new Serologico();
        $se->peso = $request->peso;
        $se->pulso = $request->pulso;
        $se->hematocrito = $request->hematocrito;
        $se->temperatura = $request->temperatura;
        $se->tension = $request->tension;
        $se->fecha = $date;
        $se->donante_id = $id;
        $se->responsable = Auth::user()->id;;
        $se->save();

        return redirect()->route('donante.serologico.historial', $id)->with('message', 'Se creo el personal correctamente');

    }

    public function consultar(Request $request)
    {   

        $request->session()->forget('error');
        
        $donante = null;
        $serologico = null;
        $pruebas = null;

        if($request->cedula){
          
            $donante = Donante::where('cedula', $request->cedula)->first();

            if($donante){

                $serologico = Serologico::where('donante_id', $donante->id)->orderBy('created_at', 'DESC')->first();
                
                $pruebasGet = PruebaDonante::where('donante_id',$donante->id)->orderBy('created_at', 'DESC')->groupBy('fecha')->get();
                $ultimo = $pruebasGet->first();
                
                $pruebas = PruebaDonante::where('donante_id', $donante->id)->where('fecha', $ultimo->fecha)->get();
            }
                
            if($donante == null)
            {
                Session::flash('error', 'Donante no encontrado');
            }
        
        }
        
        return view('consultar.index', compact('donante', 'serologico', 'pruebas'));
    }

}
