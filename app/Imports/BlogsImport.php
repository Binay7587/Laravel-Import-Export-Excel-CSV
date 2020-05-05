<?php

namespace App\Imports;

use App\Models\Blog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlogsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Blog([
            'title'     => $row['title'],
            'link'    => $row['link'],
            'summary'    => $row['summary'],
            'description'    => $row['description'],
        ]);
    }
}
