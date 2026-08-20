<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Savoir extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PlanteMaladieFactory> */
    use HasFactory;

    protected $fillable = [
        'plante_id',
        'maladie_id',
        'parties_utilisees', // Ecorce_Tronc, Feuille, Fleur, Fruit, Graine, Tige / Rameau,Racine,Ecorce_Racine,Bulbe / Rhizome
        'mode_preparation',// Calcination (Charbon), Decoction, Infusion, Maceration_Aqueuse, Maceration_Alcoolique, Poudre_Seche
        'forme_galenique', // Baume / Pommade, Collyre, Emplâtre, Tisane
        'voie_administration', // Bain_Corporel, Fumigation, Oral, Friction / Massage
        'source_type', //Tradipraticien, Herboriste, Litterature_Scientifique, Autre, Chef_de_terre, Chasseur_Dozo
        'source_information',
        'zone_geographiques',
        'contre_indication', //Grossesse, Nourrisson, Interaction
        'toxicite', //Atoxique, Faible, Elevée
        'effet_secondaire', // Vomissement, Somnolence,
        'description',

    ];

    public function plante(): BelongsTo
    {
        return $this->belongsTo(Plante::class);
    }

    public function maladie(): BelongsTo
    {
        return $this->belongsTo(Maladie::class);
    }
}
