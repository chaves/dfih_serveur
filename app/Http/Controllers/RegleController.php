<?php

namespace App\Http\Controllers;

use App\Models\Regle;
use Illuminate\Http\Request;

class RegleController extends Controller
{
    public function index()
    {
        // $regles = Regle::get();
        // return view('regles')
        // ->with('regles', $regles);
    }

    // public function store(StoreRegle $request)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'source_id' => 'required',
          'niveau' => 'required',
          'unite' => 'required',
          'cible' => 'required',
          'ordre' => 'required',
        ]);

        $regle= new Regle();

        $regle->source_id   = $validatedData['source_id'];
        $regle->niveau      = $validatedData['niveau'];
        $regle->unite       = $validatedData['unite'];
        $regle->cible       = $validatedData['cible'];
        $regle->ordre = $validatedData['ordre'];

        $regle->montant    = $request->input('montant');

        $regle->cible_si_independant = '';
        $regle->exception = '';
        $regle->min = '';
        $regle->max = '';

        $regle->save();
    }

    public function updateItem(Request $request)
    {
        // return $request->post();

        if($request->input('id') > 0) {
            $regle = Regle::findId($request->input('id'))->firstOrFail();
            $response = $request->post();
            foreach($response as $key => $value) {
                if($key != 'id' && $key != 'created_at' && $key != 'updated_at') {
                    if (isset($value)) {
                        $regle->{$key} = $value;
                    } else {
                        $regle->{$key} = '';
                    }
                }
            }
            $regle->save();
        }
    }

    public function delete(Request $request)
    {
        if ($request->segment(3)) {
            $regle = Regle::find($request->segment(3));
            $regle->delete();
        }
    }
}
