<?php

namespace App\Http\Resources;

use App\Models\Specijalizacija;
use Illuminate\Http\Resources\Json\JsonResource;

class LekarResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $specijalizacija = Specijalizacija::find($this->specijalizacijaID);

        return [
            'ID' => $this->id,
            'Ime' => $this->ime,
            'Prezime' => $this->prezime,
            'Specijalizacija' => $specijalizacija->naziv
        ];
    }
}
