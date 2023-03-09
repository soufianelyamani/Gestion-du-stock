<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\CommandeAchat;
use Illuminate\Pagination\Paginator;

class CommandeAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
        {
        $this->authorizeResource(CommandeAchat::class, 'CommandeAchat');
        }
    public function index()
    {
        $commandeAchat = CommandeAchat::paginate(8);
        Paginator::useBootstrap();
        return view('commandeAchat.index', [ 'CommandeAchat' => $commandeAchat ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseur = Fournisseur::all();
        return view('commandeAchat.create', [ 'fournisseur' => $fournisseur ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  if ($request->isMethod('post')){
        $request->validate([
            'fournisseur_id' => 'required',
            'dateCom' => 'required',
        ]);
    }
       CommandeAchat::create($request->post());
       return redirect()->route('commandeAchat.index')->with(['message' => 'Commande created uccessfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CommandeAchat $commandeAchat)
    {
        return view('commandeAchat.show', ['commandeAchat' => $commandeAchat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandeAchat $commandeAchat)
    {
        $fournisseur = Fournisseur::all();
        return view('commandeAchat.edit', ['commandeAchat' => $commandeAchat, 'fournisseur' => $fournisseur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandeAchat $commandeAchat)
    {
        $request->validate([
            'fournisseur_id' => 'required',
            'dateCom' => 'required',
        ]);

        $commandeAchat->fill($request->post())->save();
        return redirect()->route('commandeAchat.index')->with(['message' => 'Commande updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( CommandeAchat $commandeAchat)
    {
        $commandeAchat->delete();
        return redirect()->route('commandeAchat.index')->with(['message' => 'Commande deleted uccessfuly!']);
    }
}
