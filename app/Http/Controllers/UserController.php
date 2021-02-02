<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use App\Bitacora;
use Carbon\Carbon;
use DB;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('permission:users.create')->only(['create', 'store']);
        $this->middleware('permission:users.index')->only(['index']);
        $this->middleware('permission:users.edit')->only(['edit', 'update']);
        $this->middleware('permission:users.show')->only(['show']);
        $this->middleware('permission:users.destroy')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('users.index', compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $email = Persona::where('codigo_oficial', $user->codigo_oficial)->first();
        $intermedio = DB::table('role_user')->where('user_id', $user->id)->pluck('role_id');
        $role = Role::whereIn('id', $intermedio)->first();

        return view('users.show', compact('user', 'email', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $bita = new Bitacora();
        $role = Role::whereIn('id', $request->roles)->pluck('name');
        $bita->datos_antiguos = "Usuario:".$user->username." | Codigo Oficial:".$user->codigo_oficial." | Rol:".$role;

        //Actualizar usuarios
        $user->update($request->all());
        $us = User::findOrFail($user->id);
        $us->estado = $request->has('estado')? true:false;
        $us->save();

        //Actualizar roles
        $user->roles()->sync($request->get('roles'));

        $string = '';
        foreach($request->get('roles') as $rol){
            $string .= $rol.', ';
        }

        $bita->datos_nuevos = "Usuario:".$user->username." | Codigo Oficial:".$user->codigo_oficial." | Rol:".$string;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_EDIT();
        $bita->modulo = 'USUARIO';
        $bita->codigo_documento = $user->id;
        $bita->save();

        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->estado = true;
        $user->save();

        $bita = new Bitacora();
        $bita->datos_antiguos = "Usuario:".$user->username." | Codigo Oficial:".$user->codigo_oficial;
        $bita->fecha_hora = Carbon::now()->toDateTimeString();
        $bita->id_usuario = Auth::user()->id;
        $bita->ip = request()->ip();
        $bita->id_operacion = Bitacora::OP_DELETE();
        $bita->modulo = 'USUARIO';
        $bita->codigo_documento = $user->id;
        $bita->save();

        return back()->with('success', 'Eliminado con exito');
    }
}
