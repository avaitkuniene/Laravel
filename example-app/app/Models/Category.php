<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'enabled',
    ];
    protected $attributes = [
        'enabled' => false
    ];

    //One to many saryšis, kuris pagal category_id prie knygos sugebės išrišti informaciją
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
