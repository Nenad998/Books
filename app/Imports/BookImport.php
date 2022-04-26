<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            //@dd($row['naziv_knjige']),
            //@dd($row),
            'naziv_knjige'=> $row['naziv_knjige'],
            'autor'=> $row['autor'],
            'izdavac'=> $row['izdavac'],
            'godina_izdanja'=> $row['godina_izdanja'],
        ]);
    }
}
