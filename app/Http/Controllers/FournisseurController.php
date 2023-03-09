<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
        {
        $this->authorizeResource(Fournisseur::class, 'Fournisseur');
        }
    public function index()
    {
        $fournisseurs = Fournisseur::paginate();
        Paginator::useBootstrap();
        return view('fournisseur.index', [ 'fournisseurs' => $fournisseurs ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseur.create');
    }


    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $request->validate([
                'nom' => 'required',
                'telephone' => 'required',
                'email' => 'required|email',
                'ville' => 'required',
                'adresse' => 'required'
            ]);
        }

           Fournisseur::create($request->post());
           return redirect()->route('fournisseur.index')->with(['message' => 'Fournisseur created successfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('fournisseur.show', ['fournisseur' => $fournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseur.edit', ['fournisseur' => $fournisseur]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'ville' => 'required',
            'adresse' => 'required'
        ]);

        $fournisseur->fill($request->post())->save();
        return redirect()->route('fournisseur.index')->with(['message' => 'Fournisseur updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseur.index')->with(['message' => 'Fournisseur deleted uccessfuly!']);
    }
}
