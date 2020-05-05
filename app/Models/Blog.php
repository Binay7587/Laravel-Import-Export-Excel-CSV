<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function validateBlog()
    {
        $data = [
            'title' => ['string', 'required'],
            'summary' => ['required', 'string'],
            'description' => ['required', 'string'],
            'link' => ['nullable', 'url']
        ];
        return $data;
    }
}
