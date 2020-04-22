<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'lab_desc','med_desc','apr_desc','num_tiss','lab_codi','med_codi','apr_codi','tuss','ean','sub_desc'
    ];
}
