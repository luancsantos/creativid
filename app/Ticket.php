<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'label','description','health_insurance_id','type_id','department_id','client_id','status_id','user_id'
    ];
}
