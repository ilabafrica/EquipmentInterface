<?php

namespace ILabAfrica\EquipmentInterface;

use Illuminate\Database\Eloquent\Model;

class InstrumentMapping extends Model
{
    public $fillable = ['instrument_id', 'test_type_id'];

    public $timestamps = false;
}