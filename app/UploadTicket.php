<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadTicket extends Model
{
    protected $table = 'upload_tickets';

    protected $fillable = [
        'label','ticket_id'
    ];
}
