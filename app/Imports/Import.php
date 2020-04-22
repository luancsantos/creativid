<?php

namespace App\Imports;

use App\Item;
use Maatwebsite\Excel\Concerns\ToModel;

class Import implements ToModel
{


public function model(array $data)
    {
        return new Item([
            'lab_desc' => $data[0],
            'med_desc' => $data[1],
            'apr_desc' => $data[2],
            'num_tiss' => $data[3],
            'lab_codi' => $data[4],
            'med_codi' => $data[5],
            'apr_codi' => $data[6],
            'tuss'     => $data[7],
            'ean'      => $data[8],
            'sub_desc' => $data[9]
        ]);
    }
}
