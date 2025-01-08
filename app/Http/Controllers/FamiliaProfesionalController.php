<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProfesional;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FamiliaProfesionalController extends Controller
{
    public function getIndex()
    {
        return view('familias_profesionales.index')
            ->with('familiasProfesionales', FamiliaProfesional::all());
    }

    public function getShow($id)
    {
        return view('familias_profesionales.show')
            ->with('familiaProfesional', FamiliaProfesional::findOrFail($id))
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('familias_profesionales.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $familiaProfesional = FamiliaProfesional::create($request->all());
        return redirect()->action([self::class, 'getShow'], ['id' => $familiaProfesional->id]);
    }

    public function getEdit($id)
    {
        return view('familias_profesionales.edit')
            ->with('familiaProfesional', FamiliaProfesional::findOrFail($id))
            ->with('id', $id);
    }

    public function putEdit(Request $request, $id): RedirectResponse
    {
        $familiaProfesional = FamiliaProfesional::findOrFail($id);

        // TODO: Eliminar el imagen anterior si existiera
        $path = $request->file('imagen')->store('imagens', ['disk' => 'public']);
        $familiaProfesional->imagen = $path;
        $familiaProfesional->save();

        $familiaProfesional->update($request->all());
        return redirect()->action([self::class, 'getShow'], ['id' => $familiaProfesional->id]);
     }
}
