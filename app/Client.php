<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name', 'cnpj', 'email', 'street','number','state','city'
    ];
}
