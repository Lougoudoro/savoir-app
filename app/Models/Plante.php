<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plante extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PlanteFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'nom_scientifique',
        'morphologie', // Arbre, Arbuste, Herbacée, Liane
        'statut_Juridique', // Espece_Protegee (Code Forestier), Espece_Menacee,Espece_Commune
    ];

    public function planteMaladies(): HasMany
    {
        return $this->hasMany(Savoir::class);
    }
}
