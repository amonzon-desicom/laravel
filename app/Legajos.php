<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Legajos extends Model
{
    protected $table = 'Mtr_Legajos';


    public $primaryKey =['LegAdministrador','IDCodigo'];
    public $incrementing = false;
    public $timestamps = false;

    protected function setKeysForSaveQuery(Builder $query)
    {
        return $query->where('LegAdministrador', $this->getAttribute('LegAdministrador'))
            ->where('IDCodigo', $this->getAttribute('IDCodigo'));
    }

}
