<?php

namespace App\Http\Controllers;

use App\Models\Bouwtechnisch;
use Illuminate\Http\Request;

class BouwtechnischController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $bouwtechnisch = Bouwtechnisch::all();
        return view('bouwtechnisch.index', ['bouwtechnisch' => $bouwtechnisch]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($woning_id)
    {
        //
        return view('bouwtechnisch.create', ['bouwtechnisch' => Bouwtechnisch::all(), 'woning_id' => $woning_id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $bouwtechnisch = new Bouwtechnisch();
        $bouwtechnisch->woning_id = $request->input('woning_id');
        $bouwtechnisch->beglazing = $request->beglazing;
        $bouwtechnisch->stedenbouwkundige_bestemming = $request->stedenbouwkundige_bestemming;
        $bouwtechnisch->Dagvaarding_stedenbouwkundige = $request->Dagvaarding_stedenbouwkundige;
        $bouwtechnisch->Bouwvergunning = $request->Bouwvergunning;
        $bouwtechnisch->Verkavelingsvergunning = $request->Verkavelingsvergunning;
        $bouwtechnisch->Recht_van_voorkoop = $request->Recht_van_voorkoop;
        $bouwtechnisch->As_built_attest = $request->As_built_attest;
        $bouwtechnisch->Beschermd_erfgoed = $request->Beschermd_erfgoed;
        $bouwtechnisch->save();
        return redirect('/dashboard/woning/')   ->with('success', 'Bouwtechnisch is toegevoegd');
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
        $bouwtechnisch = Bouwtechnisch::find($id);
        return view('bouwtechnisch.show', ['bouwtechnisch' => $bouwtechnisch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bouwtechnisch = Bouwtechnisch::find($id);
        return view('bouwtechnisch.edit', ['bouwtechnisch' => $bouwtechnisch]);
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
        //
        $bouwtechnisch = Bouwtechnisch::find($id);
        $bouwtechnisch->beglazing = $request->beglazing;
        $bouwtechnisch->stedenbouwkundige_bestemming = $request->stedenbouwkundige_bestemming;
        $bouwtechnisch->Dagvaarding_stedenbouwkundige = $request->Dagvaarding_stedenbouwkundige;
        $bouwtechnisch->Bouwvergunning = $request->Bouwvergunning;
        $bouwtechnisch->Verkavelingsvergunning = $request->Verkavelingsvergunning;
        $bouwtechnisch->Recht_van_voorkoop = $request->Recht_van_voorkoop;
        $bouwtechnisch->As_built_attest = $request->As_built_attest;
        $bouwtechnisch->Beschermd_erfgoed = $request->Beschermd_erfgoed;
        $bouwtechnisch->save();
        return redirect()->route('bouwtechnisch.index')->with('success', 'Bouwtechnisch is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Bouwtechnisch::destroy($id);
        return redirect()->route('bouwtechnisch.index')->with('success', 'Bouwtechnisch is verwijderd');
    }
}
