<?php

namespace App\Exports;

use App\Models\Code;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCode implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Code::all();
    }
}
