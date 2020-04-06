<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthInsurance extends Model
{
    protected $table = 'health_insurance';

    protected $fillable = [
        'name', 'cd_health_insurance'
    ];
}
