<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeAchat extends Model
{
    use HasFactory;

    protected $fillable = [
        'fournisseur_id',
        'dateCom'
    ];
    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class);
    }

    public function produitAchats()
    {
        return $this->belongsToMany(Produit::class);
    }
}
