<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    //     {
    //     $this->authorizeResource(Client::class, 'clients');
    //     }
    public function index()
    {
        $clients = Client::paginate(5);
        Paginator::useBootstrap();
        return view('clients.index', [ 'clients' => $clients ]);
    }
    public function search(Request $request)
            {
                
            if($request->ajax())
            {
                
            $output="";
            $client=Client::where('nom','LIKE','%'.$request->search."%")->get();
            // $client=DB::table('clients')->where('prenom','LIKE','%'.$request->search."%")->get();
            if($client)
            {
            foreach ($client as $key =>$clients ) {
                $csrf =csrf_token();
            $output.='<tr>'.
            '<td>'.$clients->nom.'</td>'.
            '<td>'.$clients->prenom.'</td>'.
            '<td>'.$clients->email.'</td>'.
            '<td>'.$clients->adresse.'</td>'.
            ' <td>
            <div class="d-flex  justify-content-around">
                <a class="btn btn-success" href="'.route('clients.show',$clients->id).'">Afficher</a>
                <a class="btn btn-primary" href="'.route('clients.edit',$clients->id).'">Modifier</a>'.
                
               
                         <<<'blade'
                         <form action="'.route('clients.destroy',$clients->id).'" method="POST"
                         onSubmit="return confirm('.'Vous vouller vraiment supprimer ce client ?'.')">
                        @csrf
                         @method("DELETE")
                         <button class="btn btn-danger" type="submit">Supprimer</button>
                     </form> 
                     blade;'
             
             
             
             
             
             
             
            </div>
        </td>'.
            '</tr>';
            }
            return Response($output);
            }
            }
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
                'nom' => 'required',
                'prenom' => 'required',
                'telephone' => 'required',
                'email' => 'required|email',
                'ville' => 'required',
                'adresse' => 'required'
            ]);
        }

           Client::create($request->post());
           return redirect()->route('clients.index')->with(['message' => 'Client created successfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
       // return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'ville' => 'required',
            'adresse' => 'required'
        ]);

        $client->fill($request->post())->save();
        return redirect()->route('clients.index')->with(['message' => 'Client updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with(['message' => 'Client deleted uccessfuly!']);
    }
}
