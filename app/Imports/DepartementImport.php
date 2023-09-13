<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Departements;

class DepartementImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $longitude = str_replace(["E+16", "000000000"], "", $row[5]);
        $longitude = doubleval($longitude);
        if (!empty($row[1])) {
            return new Departements([
                'name' => $row[1],
                'email' => $row[2],
                'link_website' => $row[3],
                'tugas' => $row[4],
                'longitude' => $longitude,
                'latitude' => $row[6],
                // ... add other fields as needed
            ]);
        }

        // If 'name' is empty, you can choose to skip this row.
        // You can return null or an empty model as per your requirements.
        return null;
    }
}
