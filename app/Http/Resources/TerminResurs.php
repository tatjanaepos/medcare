<?php

namespace App\Http\Resources;

use App\Models\Lekar;
use App\Models\Specijalizacija;
use Illuminate\Http\Resources\Json\JsonResource;

class TerminResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lekar = Lekar::find($this->lekarID);
        $specijalizacija = Specijalizacija::find($lekar->specijalizacijaID);

        return [
            'ID' => $this->id,
            'Pacijent' => $this->pacijent,
            'Broj zdravstvene knjizice' => $this->brojKnjizice,
            'Lekar' => $lekar->ime . " " . $lekar->prezime,
            'Specijalizacija' => $specijalizacija->naziv,
            'Vreme' => $this->vreme
        ];
    }
}
