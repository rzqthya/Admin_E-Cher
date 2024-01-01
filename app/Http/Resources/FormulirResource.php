<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormulirResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'voucher' => $this->voucher->voucher,
            'deskripsi' => $this->voucher->deskripsi,
            'kota' => $this->voucher->merchant->kota->kota,
            'masaBerlaku' => $this->voucher->masaBerlaku,
            'wilayah' => $this->wilayah->samsat,
            'users' => $this->user->nama,
            'nama' => $this->nama,
            'nopol' => $this->nopol,
            'image' => $this->voucher->image,
            'token' => $this->unique_code,
        ];
    }
}
