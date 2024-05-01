<?php

namespace App\Http\Controllers;

use App\Models\NieuwType;
use Illuminate\Http\Request;

class NieuwTypeController extends Controller
{
    //

    public function index()
    {
        $nieuwTypes = NieuwType::all();
        return view('nieuwtype.index', compact('nieuwTypes'));
    }

    public function create()
    {
        return view('nieuwtype.create');
    }

    public function store(Request $request)
    {
        $nieuwType = new NieuwType();
        $nieuwType->name = $request->name;
        $nieuwType->save();
        return redirect()->route('nieuwtype.index')->with('message', 'NieuwType is toegevoegd');
    }

    public function edit($id)
    {
        $nieuwType = NieuwType::find($id);
        return view('nieuwTypes.edit', compact('nieuwType'));
    }

    public function update(Request $request, $id)
    {
        $nieuwType = NieuwType::find($id);
        $nieuwType->name = $request->name;
        $nieuwType->save();
        return redirect()->route('nieuwtype.index')->with('message', 'NieuwType is aangepast');
    }

    public function destroy($type)
    {
        NieuwType::destroy($type);
        return redirect()->route('nieuwtype.index')->with('message', 'NieuwType is verwijderd');
    }
}
