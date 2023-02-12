<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpecijalizacijaResurs;
use App\Models\Specijalizacija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecijalizacijaController extends BaseController
{
    public function index()
    {
        $specijalizacije = Specijalizacija::all();
        return $this->uspesno(SpecijalizacijaResurs::collection($specijalizacije), 'Vracene su sve specijalizacije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $specijalizacija = Specijalizacija::create($input);

        return $this->uspesno(new SpecijalizacijaResurs($specijalizacija), 'Nova specijalizacija je kreirana.');
    }


    public function show($id)
    {
        $specijalizacija = Specijalizacija::find($id);
        if (is_null($specijalizacija)) {
            return $this->greska('Specijalizacija sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new SpecijalizacijaResurs($specijalizacija), 'Specijalizacija sa zadatim ID-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $specijalizacija = Specijalizacija::find($id);
        if (is_null($specijalizacija)) {
            return $this->greska('Specijalizacija sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $specijalizacija->naziv = $input['naziv'];
        $specijalizacija->save();

        return $this->uspesno(new SpecijalizacijaResurs($specijalizacija), 'Specijalizacija je izmenjena.');
    }

    public function destroy($id)
    {
        $specijalizacija = Specijalizacija::find($id);
        if (is_null($specijalizacija)) {
            return $this->greska('Specijalizacija sa zadatim ID-em ne postoji.');
        }

        $specijalizacija->delete();
        return $this->uspesno([], 'Specijalizacija je obrisana.');
    }
}
