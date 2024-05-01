<?php

namespace App\Http\Controllers;

use App\Models\Indeling;
use Illuminate\Http\Request;

class IndelingController extends Controller
{
    public function index() {
        $indeling = Indeling::all();

        return view('indeling.index', ['indeling' => $indeling]);
    }

    public function create($woning_id) {
        return view('indeling.create', ['indeling' => Indeling::all(), 'woning_id' => $woning_id]);
    }
    public function store(Request $request, $id = null) {
        /*  $table->id();
            $table->integer('woning_id');
            $table->string('badkamer');
            $table->string('berging');
            $table->string('bureau');
            $table->string('garage');
            $table->string('keuken');
            $table->string('living');
            $table->string('parkeerplaats');
            $table->string('slaapkamer');
            $table->string('terras');
            $table->string('toilet');
            $table->string('tuin');
            $table->string('wasplaats');
            $table->string('zolder');
            $table->timestamps();
            */
        $indeling = new Indeling();
        $indeling->woning_id = $request->input('woning_id');
        $indeling->badkamer = $request->badkamer;
        $indeling->berging = $request->berging;
        $indeling->bureau = $request->bureau;
        $indeling->garage = $request->garage;
        $indeling->keuken = $request->keuken;
        $indeling->living = $request->living;
        $indeling->parkeerplaats = $request->parkeerplaats;
        $indeling->slaapkamer = $request->slaapkamer;
        $indeling->terras = $request->terras;
        $indeling->toilet = $request->toilet;
        $indeling->tuin = $request->tuin;
        $indeling->wasplaats = $request->wasplaats;
        $indeling->zolder = $request->zolder;

        $indeling->save();
        return redirect()->route('indeling.index')->with('success', 'Indeling is toegevoegd');
        // return redirect('/woning/' . $request->input('woning_id'))->with('success', 'Indeling is toegevoegd');
    } /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $indeling = Indeling::find($id);
        return view('indeling.edit', ['indeling' => $indeling]);
    }/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $indeling = Indeling::find($id);
        $indeling->badkamer = $request->badkamer;
        $indeling->berging = $request->berging;
        $indeling->bureau = $request->bureau;
        $indeling->garage = $request->garage;
        $indeling->keuken = $request->keuken;
        $indeling->living = $request->living;
        $indeling->parkeerplaats = $request->parkeerplaats;
        $indeling->slaapkamer = $request->slaapkamer;
        $indeling->terras = $request->terras;
        $indeling->toilet = $request->toilet;
        $indeling->tuin = $request->tuin;
        $indeling->wasplaats = $request->wasplaats;
        $indeling->zolder = $request->zolder;
        
        $indeling->save();
        return redirect()->route('indeling.index')->with('success', 'Indeling is aangepast');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $indeling = Indeling::find($id);
        $indeling->delete();
        return redirect('/woning/' . $indeling->woning_id);
    }
}
