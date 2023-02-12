<?php

namespace App\Http\Controllers;

use App\Http\Resources\LekarResurs;
use App\Models\Lekar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LekarController extends BaseController
{
    public function index()
    {
        $lekari = Lekar::all();
        return $this->uspesno(LekarResurs::collection($lekari), 'Vraceni su svi lekari.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'specijalizacijaID' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $lekar = Lekar::create($input);

        return $this->uspesno(new LekarResurs($lekar), 'Novi lekar je kreiran.');
    }


    public function show($id)
    {
        $lekar = Lekar::find($id);
        if (is_null($lekar)) {
            return $this->greska('Lekar sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new LekarResurs($lekar), 'Lekar sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $lekar = Lekar::find($id);
        if (is_null($lekar)) {
            return $this->greska('Lekar sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'specijalizacijaID' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $lekar->ime = $input['ime'];
        $lekar->prezime = $input['prezime'];
        $lekar->specijalizacijaID = $input['specijalizacijaID'];
        $lekar->save();

        return $this->uspesno(new LekarResurs($lekar), 'Lekar je izmenjen.');
    }

    public function destroy($id)
    {
        $lekar = Lekar::find($id);
        if (is_null($lekar)) {
            return $this->greska('Lekar sa zadatim ID-em ne postoji.');
        }

        $lekar->delete();
        return $this->uspesno([], 'Lekar je obrisan.');
    }
}
