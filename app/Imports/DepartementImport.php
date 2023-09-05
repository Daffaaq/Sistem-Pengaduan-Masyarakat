<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Departements;

class DepartementImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Departements([
            'name' => $row['name'],
            'email' => $row['email'],
            'link_website' => $row['link_website'],
            'tugas' => $row['tugas'],
            'longitude' => $row['longitude'],
            'latitude' => $row['latitude'],
            // ... tambahkan field lainnya sesuai dengan urutan kolom dalam file
        ]);
    }
}
