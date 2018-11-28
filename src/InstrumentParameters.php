<?php

namespace ILabAfrica\EquipmentInterface;

use Illuminate\Database\Eloquent\Model;

class InstrumentParameters extends Model
{
    public $fillable = ['measure_id', 'sub_test_id'];

    public $timestamps = false;
}