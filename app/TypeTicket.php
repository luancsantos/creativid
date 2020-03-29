<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    protected $table = 'type_ticket';

    protected $fillable = [
        'name','created_at'
    ];
}
