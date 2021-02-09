<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Position extends Model
{
    use HasFactory, Sushi;

    protected $casts = [
        'tags' => 'array',
        'description' => 'array',
        'responsibilities' => 'array',
        'requirements' => 'array',
        'jsonld' => 'array',
    ];

    public function getRows()
    {
        return collect(json_decode(file_get_contents(config('app.positions')), true))
                ->map(function ($item) {
                    $row = [];
                    $strings = ['title', 'slug', 'needed', 'banner', 'thumbnail'];

                    foreach ($item as $key => $value) {
                        $row[$key] = in_array($key, $strings) ? $value : json_encode($value);
                    }

                    return $row;
                })
                ->toArray();
    }
}
