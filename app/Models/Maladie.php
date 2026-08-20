<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maladie extends BaseModel
{
    /** @use HasFactory<\Database\Factories\MaladieFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'systeme', // Maladie_Infectieuse, Maladie_Digestive, Dermatologie,Sante_Reproductive,  Maladie_Respiratoire
        'Symptomes',// Céphalée (Maux de tête), Fievre, Oedème
    ];

    public function planteMaladies(): HasMany
    {
        return $this->hasMany(PlanteMaladie::class);
    }
}
