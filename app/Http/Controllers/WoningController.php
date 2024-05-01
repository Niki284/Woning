<?php

namespace App\Http\Controllers;

use App\Models\Bouwtype;
use App\Models\Makelaar;
use App\Models\NieuwType;
use App\Models\Technisch;
use App\Models\Voorziningen;
use App\Models\Woning;
use App\Models\WoningType;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WoningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // heer kan je de woning re"nderen een filteren op basis van de zoekopdracht
        $woningHuis = Woning::query();
        $woningtypes = WoningType::all();
        
        $search = request('search');
    
        if ($search) {
            $woningHuis->where('price', 'like', '%' . $search . '%');
        }
    
        $filter = request('filter');
    
        if ($filter) {
            $woningHuis->whereHas('woningTypes', function ($query) use ($filter) {
                $query->where('name', $filter);
            });
        }

        if (request('minprice') && request('maxprice')) {
            $woningHuis->whereBetween('price', [request('minprice'), request('maxprice')]);
        }

        $filterGemente = request('filterGemente');
        if ($filterGemente) {
            $woningHuis->where('city', 'like', '%' . $filterGemente . '%');
        }
    
        $woningHuis = $woningHuis->get();
    
        return view('woning.index', [
            'woningHuis' => $woningHuis,
            'search' => $search,
            'minprice' => request('minprice'),
            'maxprice' => request('maxprice'),
            'filterGemente' => $filterGemente,
            'woning_type_id' => WoningType::all(),
            'filter' => $filter,
            'woningtypes' => $woningtypes
        ]);



        // $woningHuis = Woning::all();
        // $woningtypes = WoningType::all();
        // $search = request('search');
        // if($search) {
        //     $woningHuis = Woning::where(
        //         'price', 'like', '%' . $search . '%'
        //     )->get();
        // }

        // $filter = request('filter');
        // if($filter) {
        //     $woningHuis = Woning::where(
        //         'woning_type_id', 'like', '%' . $filter . '%'
        //     )->get();
        // }
        // return view('woning.index', 
        // ['woningHuis' => $woningHuis ,
        //   'search' => $search ,
        //    'woning_type_id'=>WoningType::all() 
        //    , 'filter' => $filter ,
        //     'woningtypes' => $woningtypes]);
    }
    
        
        // $minprice = request('minprice');
        // $maxprice = request('maxprice');
        // if($minprice && $maxprice) {
        //     $woningHuis = Woning::whereBetween(
        //         'price'
        //     , [$minprice, $maxprice])->get();
        // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('woning.create', ['woningHuis' => Woning::all() , 'woning_types'=>WoningType::all(), 'bouwtypes'=>Bouwtype::all(), 'nieuwTypes'=>NieuwType::all(), 'voorziningen'=>Voorziningen::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id = null)
    {

        $woningHuis = new Woning();
        $woningHuis->title = $request->title;
        $woningHuis->subtitle = $request->subtitle;
        $woningHuis->price = $request->price;
        $woningHuis->description= $request->description;
        $woningHuis->city = $request->city;
        $woningHuis->postcode = $request->postcode;
        $woningHuis->address = $request->address;
        $woningHuis->rooms = $request->rooms;
        $woningHuis->size = $request->size;
        $woningHuis->refnummer = $request->refnummer;
        $woningHuis->woning_type_id = $request->woning_type_id;
        $woningHuis->bouwtype_id = $request->bouwtype_id;
        $woningHuis->nieuwtype_id = $request->nieuwtype_id;
        $woningHuis->makelaar_id = $request->makelaar_id;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images', 'public');
            $woningHuis->image = Storage::url($imagePath);
        }

        $woningHuis->save();
        // Haal de geselecteerde voorzieningen op uit het verzoek
        $selectedVoorzieningen = $request->input('voorziening', []);

        // Koppel de geselecteerde voorzieningen aan de woning
        $woningHuis->voorzieningen()->attach($selectedVoorzieningen);
        
        return redirect('/dashboard/')->with('success', 'Woning is toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // heer  render je detail pagina van woning met id
        $woningHuis = Woning::find($id);
        
        if ($woningHuis->indeling == $id  ) {
            // Als het null is, doorsturen naar de indeling.create route
            return redirect()->route('indeling.create');
        }

        if ($woningHuis->technisch == $id) {
            // Als het null is, doorsturen naar de technisch.create route
            return redirect()->route('technisch.create');
        }
        // $woningHuis
        // dd($woningHuis->bouwtypes);

        //heer render je de gerelateerde woningen
        //$reletedWoning = Woning::where('woning_type_id', $woningHuis->woning_type_id)->where('id', '!=', $woningHuis->id)->get();
        $reletedWoning = Woning::where('woning_type_id', $woningHuis->woning_type_id)->where('id', '!=', $woningHuis->id)->limit(3)->get();    
        
        return view('woning.show', ['woningHuis' => $woningHuis, 'woning_types'=>WoningType::all(), 'bouwtypes'=>Bouwtype::all(), 'makelaar'=> Makelaar::all()  , 'relentedWoning' => $reletedWoning ]);
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
        $woningHuis = Woning::find($id);
        return view('woning.edit', ['woningHuis' => $woningHuis , 'woning_types'=>WoningType::all(), 'bouwtypes'=>Bouwtype::all() , 'nieuwTypes'=>NieuwType::all(), 'voorziningen'=>Voorziningen::all(), 'makelaars'=>Makelaar::all()]);
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
        $woningHuis = Woning::find($id);
        $woningHuis->title = $request->title;
        $woningHuis->subtitle = $request->subtitle;
        $woningHuis->price = $request->price;
        $woningHuis->description= $request->description;
        $woningHuis->city = $request->city;
        $woningHuis->postcode = $request->postcode;
        $woningHuis->address = $request->address;
        $woningHuis->rooms = $request->rooms;
        $woningHuis->size = $request->size;
        $woningHuis->refnummer = $request->refnummer;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images', 'public');
            $woningHuis->image = Storage::url($imagePath);
        }

        $woningHuis->save();
        // Haal de geselecteerde voorzieningen op uit het verzoek
        $selectedVoorzieningen = $request->input('voorziening', []);
        $woningHuis->voorzieningen()->sync($selectedVoorzieningen);
        return redirect('/dashboard/')->with('success', 'Woning is aangepast');
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
        Woning::destroy($id);
        return redirect('/dashboard/')->with('success', 'Woning is verwijderd');
    }
}
