<?php

namespace App\Exports;

use App\Models\sobe;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportsobe implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return sobe::all();
    }
}
