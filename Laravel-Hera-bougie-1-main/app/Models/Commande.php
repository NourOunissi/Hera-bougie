<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\LignesCommande;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_commande',
         'date_commande',
         'HT',
        'TTC',
        'TVA',
    ];
    
    public function Lignes(): HasMany
    {
        return $this->hasMany(LignesCommande::class);
    }

}
