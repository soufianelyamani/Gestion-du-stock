<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\CommandeVente;
use Illuminate\Pagination\Paginator;

class CommandeVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
        {
        $this->authorizeResource(CommandeVente::class, 'CommandeVente');
        }
    public function index()
    {
        $commandeVentes = CommandeVente::paginate(8);
        Paginator::useBootstrap();
        return view('commandeVentes.index', [ 'commandeVentes' => $commandeVentes ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('commandeVentes.create', [ 'clients' => $clients ]);
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
                'client_id' => 'required',
                'dateCom' => 'required',
            ]);
        }
           CommandeVente::create($request->post());
           return redirect()->route('commandeVentes.index')->with(['message' => 'Commande created uccessfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CommandeVente $commandeVente)
    {
        return view('commandeVentes.show', ['commandeVente' => $commandeVente]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandeVente $commandeVente)
    {
        $clients = Client::all();
        return view('commandeVentes.edit', ['commandeVente' => $commandeVente, 'clients' => $clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandeVente $commandeVente)
    {
        $request->validate([
            'client_id' => 'required',
            'dateCom' => 'required',
        ]);

        $commandeVente->fill($request->post())->save();
        return redirect()->route('commandeVentes.index')->with(['message' => 'Commande updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandeVente $commandeVente)
    {
        $commandeVente->delete();
        return redirect()->route('commandeVentes.index')->with(['message' => 'Commande deleted uccessfuly!']);
    }
}