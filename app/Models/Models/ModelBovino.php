<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBovino extends Model
{
    protected $table="bovinos";
    protected $fillable=["id", "peso", "leiteProduzido", "racaoConsumida", "data_nasc", "abatido"];
}
