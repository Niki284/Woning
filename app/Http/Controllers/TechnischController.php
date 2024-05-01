<?php

namespace App\Http\Controllers;

use App\Models\Technisch;
use Illuminate\Http\Request;

class TechnischController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $technisch = Technisch::all();
        return view('technisch.index', ['technisch' => $technisch]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($woning_id)
    {
        //
        return view('technisch.create', ['technisch' => Technisch::all() , 'woning_id' => $woning_id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id = null)
    {
        // TECHNISCH DATA OPSLAAN

        /** 
         *    $table->string('bouwjaar');
            $table->string('algemene staat');
            $table->string('renovatieverplichting');
            $table->string('overstromingsgevoeligheid');
            $table->string('afgebakende_zone');
            $table->string('G(ebouw)-score');
            $table->string('P(erceel)-score');
            $table->string('certificaat_elektriciteit');
            $table->string('lift');
            $table->string('EPC');
         */


        $technisch = new Technisch();
        $technisch->woning_id = $request->input('woning_id');
        $technisch->bouwjaar = $request->bouwjaar;
        $technisch->algemene_staat = $request->algemene_staat;
        $technisch->renovatieverplichting = $request->renovatieverplichting;
        $technisch->overstromingsgevoeligheid = $request->overstromingsgevoeligheid;
        $technisch->afgebakende_zone = $request->afgebakende_zone;
        $technisch->G_ebouw_score = $request->G_ebouw_score;
        $technisch->P_erceel_score = $request->P_erceel_score;
        $technisch->certificaat_elektriciteit = $request->certificaat_elektriciteit;
        $technisch->lift = $request->lift;
        $technisch->EPC = $request->EPC;
        $technisch->totale_opp_grond = $request->totale_opp_grond;
        $technisch->bouw_opp_grond = $request->bouw_opp_grond;
        $technisch->save();
        return redirect('dashboard/woning/')->with('success', 'Technisch is toegevoegd');
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
        $technisch = Technisch::find($id);
        return view('technisch.show', ['technisch' => $technisch]);

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
        $technisch = Technisch::find($id);
        return view('technisch.edit', ['technisch' => $technisch]);
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
        $technisch = Technisch::find($id);
        $technisch->bouwjaar = $request->bouwjaar;
        $technisch->algemene_staat = $request->algemene_staat;
        $technisch->renovatieverplichting = $request->renovatieverplichting;
        $technisch->overstromingsgevoeligheid = $request->overstromingsgevoeligheid;
        $technisch->afgebakende_zone = $request->afgebakende_zone;
        $technisch->G_ebouw_score = $request->G_ebouw_score;
        $technisch->P_erceel_score = $request->P_erceel_score;
        $technisch->certificaat_elektriciteit = $request->certificaat_elektriciteit;
        $technisch->lift = $request->lift;
        $technisch->EPC = $request->EPC;
        $technisch->totale_opp_grond = $request->totale_opp_grond;
        $technisch->bouw_opp_grond = $request->bouw_opp_grond;
        $technisch->save();
        return redirect()->route('technisch.index')->with('success', 'Technisch is aangepast');

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
        $technisch = Technisch::find($id);
        $technisch->delete();
        return redirect()->route('technisch.index')->with('success', 'Technisch is verwijderd');
    }
}
