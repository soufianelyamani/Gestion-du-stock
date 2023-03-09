<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Pagination\Paginator;
use App\Models\TypeProduit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    $this->authorizeResource(Produit::class, 'Produit');
    }
    public function index()
    {
        $produit = Produit::paginate(5);
        $type_produit = TypeProduit::all();
        Paginator::useBootstrap();
        return view('produit.index', [ 'produit' => $produit ,'type_produit'=>$type_produit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produit = TypeProduit::all();
        return view('produit.create',['produit'=>$produit]);
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
                'type_produit_id' => 'required',
                'prix' => 'required',
                'image' => 'required', 
                'description' => 'required',
                'qtStock' => 'required'
            ]);
        }
        
        $fileName = time().'.'.$request->image->extension();  
           $request->image->move(public_path('uploads'),$fileName);

        $var = new Produit([
            'liblle' => $request->get('liblle') ,
            'prix' =>  $request->get('prix') ,
            'image' => $fileName,
            'description' =>  $request->get('description') ,
            'qtStock' =>  $request->get('qtStock') ,
            'type_produit_id' =>  $request->get('type_produit_id') ,       
        ]);  
        $var->save();
        // Produit::create($request->post())->save();
        return redirect()->route('produit.index')->with(['message' => 'produit created successfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view('produit.show',['produit'=>$produit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $type_produit = TypeProduit::all();
        return view('produit.edit',['produit' => $produit,'type_produit'=>$type_produit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Produit $produit)
    {
        if ($request->isMethod('post')){
            $request->validate([
                'liblle' => 'required',
                'type_produit_id' => 'required',
                'prix' => 'required',
                'image' => 'required', 
                'description' => 'required',
                'qtStock' => 'required'
            ]);
        }


        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'),$fileName);

        $produit->liblle = $request->input('liblle');
        $produit->prix = $request->input('prix');
        $produit->image = $fileName;
        $produit->description = $request->input('description');
        $produit->qtStock = $request->input('qtStock');
        $produit->type_produit_id = $request->input('type_produit_id');

        
        

        
        $produit->save();
        return redirect()->route('produit.index')->with(['message' => 'produit created successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produit.index')->with(['message' => 'produit deleted successfuly!']);
    }
}
