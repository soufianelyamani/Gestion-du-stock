<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeVente extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'dateCom'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function produitVents()
    {
        return $this->belongsToMany(Produit::class);
    }
}