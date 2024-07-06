<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Docente::query();

        if ($request ->has('nombre')) {
            $query ->where('nombre' , 'like' , '%' . $request->apellido . '%');
        }

        $query = Docente::query();

        if ($request ->has('apellido')) {
            $query ->where('apellido' , 'like' , '%' . $request->apellido . '%');
        }
        $docentes = $query->orderBy('id' , 'desc')->simplePaginate(10);
        return view('docentes.index', compat('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['password' =>Hash::make($request->password)]);
        $docentes =Docente::create($request->all());
        return redirect()->route('docentes.index')-with('succes', 'Docente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docentes = Docente::find($id);

        if (!$docentes) {
            return abort (404);
        }

        return view('docentes.show' , compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $docentes = Docentes::fin($id);

        if (!$docentes) {
            return abort (404);
        }

        return view('docentes.edit' , compact('docente'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $docentes = Docentes::fin($id);

        if (!$docentes) {
            return abort(404);
        }

        $docentes->nombre = $request->nombre;
        $docentes->apellido = $request->apellido;
        $docentes->email = $request->email;

        $docentes->save();

        return redirect()->route('docentes.index')- with('succes' , 'Docente actualizado correctamente. ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $docentes = Docente::fin($id);

        if (!$docentes) {
            return abort (404);
        }

        return view('docentes.delete', compact ('docentes'));
    }

    public function destroy($id)
    {
        $docentes = Docente::fin($id);

        if (!$docentes) {
            return abort(404);
        }

        $docentes->delete();

        return direct()->route('docentes.index')->with('success', 'docente eliminado correctamente ');
    }

    public function showLoginForm()
    {
        return view('docentes.login');
    }

    public function login(Request $request)
    {
        $credetials = $request->only('email', 'password');

        if (Auth::guard('docente')->attempt($credetials)) {
            return redirect()->intended();
        }

        return redirect()->back()->withErros([
            'InvalidaCredenitials' => 'Las credenciales porporcionales no coinciden con nuestros registros',
        ]);
    }
    public function logout()
    {
        Auth::guard('docente')->logout();
        return redirect()->route('docentes.showLoginForm');
    }
}
