<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Client;
use App\Models\TypeProduit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TypeProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    $this->authorizeResource(TypeProduit::class, 'TypeProduit');
    }
    public function index()
    {
        $typeProduits = TypeProduit::paginate(5);
        Paginator::useBootstrap();
        return view('typeProduits.index', [ 'typeProduits' => $typeProduits ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeProduits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $request->validate([
                'liblle' => 'required',
            ]);
        }

        //    TypeProduit::create($request->post()->save());
        $var =  new TypeProduit();
        $var->liblle = $request->input('liblle');
        $var->save();
           return redirect()->route('typeProduits.index')->with(['message' => 'type produit created successfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProduit $typeProduit)
    {
        return view('typeProduits.show', ['typeProduit' => $typeProduit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProduit $typeProduit)
    {

        return view('typeProduits.edit',['typeProduit' => $typeProduit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $typeProduit)
    {
        $request->validate([
            'liblle' => 'required'
        ]);
        $var =  TypeProduit::findOrFail($typeProduit);
        $var->liblle = $request->input('liblle');
        $var->save();
        return redirect()->route('typeProduits.index')->with(['message' => 'type Produit updated successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProduit $typeProduit)
    {
        $typeProduit->delete();
        return redirect()->route('typeProduits.index')->with(['message' => 'TypeProduit deleted successfuly!']);
    }
}