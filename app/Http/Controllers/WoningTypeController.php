<?php

namespace App\Http\Controllers;
use App\Models\WoningType;
use Illuminate\Http\Request;

class WoningTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $woningType = WoningType::all();
        return view('woningType.index', ['woningType' => $woningType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('woningType.create' , ['woningType' => WoningType::all()]);
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
        $woningType = new WoningType();
        $woningType->name = $request->name;
        $woningType->save();
        return redirect('/dashboard')   ->with('success', 'WoningType is toegevoegd');
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
        $woningType = WoningType::find($id);
        return view('woningType.show', ['woningType' => $woningType]);
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
        return redirect()->route('woningType.index')->with('success', 'WoningType is aangepast');
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
        $woningType = WoningType::find($id);
        $woningType->name = $request->name;
        $woningType->save();
        return redirect()->route('woningType.index')->with('success', 'WoningType is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WoningType $typeId)
    {
        // Heer kan je de woningType verwijderen 
        $typeId->delete();
        return redirect()->route('woningType.index')->with('success', 'WoningType is verwijderd');
    }
}
