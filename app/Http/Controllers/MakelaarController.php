<?php

namespace App\Http\Controllers;

use App\Models\Makelaar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MakelaarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('makelaar.index', ['makelaar' => Makelaar::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('makelaar.create', ['makelaar' => Makelaar::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id = null)
    {
        //
        /*  $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('phone');
            $table->string('reference');
            $table->string('foto');
            $table->timestamps();
            */
        $makelaar = new Makelaar();
        $makelaar->name = $request->name;
        $makelaar->lastname = $request->lastname;
        $makelaar->phone = $request->phone;
        $makelaar->reference = $request->reference;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images/profile', 'public');
            $makelaar->image = Storage::url($imagePath);
        }
        $makelaar->save();

        return redirect()->route('makelaar.index')->with('success', 'Woning is toegevoegd');
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
        return view('makelaar.show', ['makelaar' => Makelaar::findOrFail($id)]);
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
        return view('makelaar.edit', ['makelaar' => Makelaar::findOrFail($id)]);

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
        $makelaar = Makelaar::find($id);
        $makelaar->name = $request->name;
        $makelaar->lastname = $request->lastname;
        $makelaar->phone = $request->phone;
        $makelaar->reference = $request->reference;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images/profile', 'public');
            $makelaar->image = Storage::url($imagePath);
        }
        $makelaar->save();
        return redirect()->route('makelaar.index')->with('success', 'Woning is aangepast');
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
        Makelaar::destroy($id);
        return redirect()->route('makelaar.index')->with('success', 'Woning is verwijderd');
    }
}
