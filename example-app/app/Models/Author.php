<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'country',
        'date_of_birth',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function getFullNameAttribute(): string
    {
        return sprintf('%s %s (%s)', $this->name, $this->last_name, $this->country);
    }
}
