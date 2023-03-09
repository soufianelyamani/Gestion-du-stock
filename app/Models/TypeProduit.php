<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduit extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeProduit'
       
    ];
    public function produits(){
        return $this->hasMany(Produit::class,'type_produit_id');
    }
}
