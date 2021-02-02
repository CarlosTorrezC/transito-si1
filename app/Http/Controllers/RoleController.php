<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Bitacora;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('permission:roles.create')->only(['create', 'store']);
        $this->middleware('permission:roles.index')->only(['index']);
        $this->middleware('permission:roles.edit')->only(['edit', 'update']);
        $this->middleware('permission:roles.show')->only(['show']);
        $this->middleware('permission:roles.destroy')->only(['destroy']);
    }

    public static $ROLE_S = 'ROL';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        
        //Actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

        $bita = new Bitacora();
        $bita->datos_nuevos = "Rol:".$role->name." | Slug:".$role->slug;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_CREATE();
        $bita->modulo = self::$ROLE_S;
        $bita->codigo_documento = $role->id;
        $bita->save();

        return redirect()->route('roles.index')->with('success', 'Rol guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $bita = new Bitacora();
        $bita->datos_antiguos = "Rol:".$role->name." | Slug:".$role->slug;

        //Actualizar usuarios
        $role->update($request->all());

        //Actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

        $bita->datos_nuevos = "Rol:".$role->name." | Slug:".$role->slug;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = self::$ROLE_S;
        $bita->codigo_documento = $role->id;
        $bita->save(); 

        return redirect()->route('roles.edit', $role->id)->with('success', 'Rol actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $bita = new Bitacora();
        $bita->datos_antiguos = "Rol:".$role->name." | Slug:".$role->slug;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = self::$ROLE_S;
        $bita->codigo_documento = $role->id;
        $bita->save();

        $role->delete();

        return back()->with('success', 'Eliminado con exito');
    }
}
