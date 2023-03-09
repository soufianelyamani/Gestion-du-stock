<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'liblle',
        'type_produit_id',
        'prix',
        'image',
        'description',
        'qtStock'
    ];
    use HasFactory;

    public function typeProduit(){
        return $this->belongsTo(TypeProduit::class, 'type_produit_id');
    }

    public function commandeVents()
    {
        return $this->belongsToMany(CommandeVente::class);
    }

    public function commandeAchats()
    {
        return $this->belongsToMany(CommandeAchat::class);
    }
}