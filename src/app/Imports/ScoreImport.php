<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\SalesOrder;
use Maatwebsite\Excel\Concerns\ToCollection;

class ScoreImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return SalesOrder::all();
    }
}
