<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source;

class SourceController extends Controller
{
    public function index()
    {
        return Source::where('valide', 0)->paginate(7);
    }

    public function valides()
    {
        return Source::where('valide', 1)->paginate(7);
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

}
