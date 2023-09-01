<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Departements;

class DepartementImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Departements([
            'name' => $row[0],
            'email' => $row[1],
            'link_website' => $row[2],
            'tugas' => $row[3],
            'longitude' => $row[4],
            'latitude' => $row[5],
            // ... tambahkan field lainnya sesuai dengan urutan kolom dalam file
        ]);
    }
}
