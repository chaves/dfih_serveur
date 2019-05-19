<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source;
use App\Models\Regle;

class SourceController extends Controller
{
    public function index()
    {
        return Source::where('valide', 0)->orderBy('corporation', 'asc')->orderBy('infodate', 'asc')->paginate(10);
    }

    public function valides()
    {
        return Source::where('valide', 1)->orderBy('updated_at', 'desc')->paginate(10);
    }

    public function show(Request $request)
    {
        if ($request->segment(3) <> '') {
            return Source::findId($request->segment(3))->first();
        }
    }

    public function make_valid(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->first();
        $source->valide = 1;
        $source->save();
    }

    public function make_un_valid(Request $request)
    {
        $source = Source::findId($request->input('source_id'))->first();
        $source->valide = 0;
        $source->save();
    }

    public function import_source_id(Request $request) {

        $source_cible = Source::findId($request->input('import_id'))->first();

        // récupère les règles à importer
        if ($source_cible) {
            $nouvelles_regles = Regle::findSourceId($request->input('import_id'))->get();
        }

        // efface les règles existantes
        if ($nouvelles_regles) {
            Regle::findSourceId($request->input('source_id'))->delete();
        }
        // réplique les règles avec le nouveau dource_id
        foreach ($nouvelles_regles as $regle) {
            $nouvelle_regle = $regle->replicate();
            $nouvelle_regle->source_id = $request->input('source_id');
            $nouvelle_regle->save();
        }
        return $nouvelles_regles;
    }

}
