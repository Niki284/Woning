<?php

namespace App\Http\Controllers;

use App\Models\Bouwtype;
use Illuminate\Http\Request;

class BouwtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bouwtypes = Bouwtype::all();
        return view('bouwtype.index', compact('bouwtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bouwtype.create' , ['bouwtypes' => Bouwtype::all()]);

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
        $bouwtype = new Bouwtype();
        $bouwtype->name = $request->name;
        $bouwtype->save();
        return redirect('/dashboard')   ->with('success', 'Bouwtype is toegevoegd');
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
        $bouwtype = Bouwtype::find($id);
        return view('bouwtype.show', ['bouwtype' => $bouwtype]);
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
        $bouwtype = Bouwtype::find($id);
        return view('bouwtype.edit', ['bouwtype' => $bouwtype]);
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
        $bouwtype = Bouwtype::find($id);
        $bouwtype->name = $request->name;
        $bouwtype->save();
        return redirect()->route('bouwtype.index')->with('success', 'Bouwtype is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type)
    {
        //
        Bouwtype::destroy($type);
        return redirect()->route('bouwtype.index')->with('success', 'Bouwtype is verwijderd');
    }
}
