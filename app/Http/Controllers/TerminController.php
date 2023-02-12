<?php

namespace App\Http\Controllers;

use App\Http\Resources\TerminResurs;
use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TerminController extends BaseController
{
    public function index()
    {
        $termini = Termin::all();
        return $this->uspesno(TerminResurs::collection($termini), 'Vraceni su svi termini.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'pacijent' => 'required',
            'brojKnjizice' => 'required',
            'lekarID' => 'required',
            'vreme' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $termin = Termin::create($input);

        return $this->uspesno(new TerminResurs($termin), 'Novi termin je kreiran.');
    }


    public function show($id)
    {
        $termin = Termin::find($id);
        if (is_null($termin)) {
            return $this->greska('Termin sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new TerminResurs($termin), 'Termin sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $termin = Termin::find($id);
        if (is_null($termin)) {
            return $this->greska('Termin sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'pacijent' => 'required',
            'brojKnjizice' => 'required',
            'lekarID' => 'required',
            'vreme' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $termin->pacijent = $input['pacijent'];
        $termin->brojKnjizice = $input['brojKnjizice'];
        $termin->lekarID = $input['lekarID'];
        $termin->vreme = $input['vreme'];
        $termin->save();

        return $this->uspesno(new TerminResurs($termin), 'Termin je izmenjen.');
    }

    public function destroy($id)
    {
        $termin = Termin::find($id);
        if (is_null($termin)) {
            return $this->greska('Termin sa zadatim ID-em ne postoji.');
        }
        $termin->delete();
        return $this->uspesno([], 'Termin je obrisan.');
    }
}
