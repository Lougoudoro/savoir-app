<?php

use App\Models\Plante;
use EasyRdf\Graph;
use EasyRdf\RdfNamespace;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dev', function () {
    RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
    RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
    RdfNamespace::set('api', 'http://bf-med-plant-onto.test/ontology#');

    $graph = new Graph;
    $graph->resource('api:', 'owl:Ontology');
    $graph->resource('api:Plante', 'owl:Class');
    $graph->resource('api:Maladie', 'owl:Class');

    $graph->resource('api:soigne', 'owl:ObjectProperty')
        ->addLiteral('rdfs:label', 'soigne', 'fr');

    foreach (Plante::with('planteMaladies.maladie')->get() as $plante) {
        $planterInstance = $graph->resource('api:Plante_'.$plante->id, 'api:Plante');
        $planterInstance->addLiteral('rdfs:label', $plante->label);

        foreach ($plante->planteMaladies as $planteMaladie) {
            $maladieInstance = $graph->resource('api:Maladie_'.$planteMaladie->maladie->id, 'api:Maladie');

            if (! $maladieInstance->hasProperty('rdfs:label')) {
                $maladieInstance->addLiteral('rdfs:label', $planteMaladie->maladie->label, 'fr');
            }
            $planterInstance->add('api:soigne', $maladieInstance);
        }
    }

    // $output = $graph->serialise('turtle');
    // return $output;
    $output = $graph->serialise('rdfxml');

    return response($output)->header('Content-Type', 'text/xml');
    // ->header('Content-Type', 'application/rdf+xml');
});
