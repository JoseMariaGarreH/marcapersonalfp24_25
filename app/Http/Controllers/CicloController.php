<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;

class CicloController extends Controller
{
    public function getIndex()
    {
        return view('ciclos.index')
            ->with('ciclos', Ciclo::all());
    }

    public function getShow($id)
    {
        return view('ciclos.show')
            ->with('ciclo', Ciclo::findOrFail($id))
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('ciclos.create');
    }

    public function getEdit($id)
    {
        return view('ciclos.edit')
            ->with('ciclo', Ciclo::findOrFail($id))
            ->with('id', $id);
    }
}
