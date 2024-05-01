<?php

namespace App\Http\Controllers;

use App\Models\Bouwtype;
use Illuminate\Http\Request;

class BouwtypeController extends Controller
{
    //

    public function index()
    {
        $bouwtypes = Bouwtype::all();
        return view('bouwtype.index', compact('bouwtypes'));
    }

    public function create()
    {
        return view('bouwtype.create');
    }

    public function store(Request $request)
    {
      $bouwtype = new Bouwtype();
        $bouwtype->name = $request->name;
        $bouwtype->save();

        return redirect()->route('bouwtype.index')
            ->with('success', 'Bouwtype created successfully.');
    }

    public function show($id)
    {
        return view('bouwtype.show', compact('bouwtype'));
    }

    public function edit(Bouwtype $bouwtype)
    {
        return view('bouwtype.edit', compact('bouwtype'));
    }

    public function update(Request $request,  $id)
    {
      $bouwtype = Bouwtype::find($id);
        $bouwtype->name = $request->name;
        $bouwtype->save();

        return redirect()->route('bouwtype.index')
            ->with('success', 'Bouwtype updated successfully');
    }

    public function destroy(Bouwtype $bouwtype)
    {
        $bouwtype->delete();

        return redirect()->route('bouwtype.index')
            ->with('success', 'Bouwtype deleted successfully');
    }
}
