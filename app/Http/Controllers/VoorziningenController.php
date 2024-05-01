<?php

namespace App\Http\Controllers;

use App\Models\Voorziningen;
use Illuminate\Http\Request;

class VoorziningenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Heer render ik de view voorzieningen.index
        $voorziningen = Voorziningen::all();
        return view('voorziningen.index', ['voorziningen' => $voorziningen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // heer kan je voorziningen toevoegen
        return view('voorziningen.create' , ['voorziningen' => Voorziningen::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // heer kan je voorziningen opslaan
        $voorziningen = new Voorziningen();
        $voorziningen->voorzining = $request->voorzining;
        $voorziningen->save();
        return redirect()->route('voorziningen.index')->with('success', 'Voorziningen is toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // heer kan je voorziningen zien details pagina
        $voorziningen = Voorziningen::find($id);
        return view('voorziningen.show', ['voorziningen' => $voorziningen]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // heer kan je voorziningen aanpassen dat is de pad naar de edit pagina
        $voorziningen = Voorziningen::find($id);
        return view('voorziningen.edit', ['voorziningen' => $voorziningen]);

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
        // heer kan je voorziningen aanpassen
        $voorziningen = Voorziningen::find($id);
        $voorziningen->voorzining = $request->voorzining;
        $voorziningen->save();
        return redirect()->route('voorziningen.index')->with('success', 'Voorziningen is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // deleten van voorziningen
        Voorziningen::destroy($id);
        return redirect()->route('voorziningen.index')->with('success', 'Voorziningen is verwijderd');
    }
}
