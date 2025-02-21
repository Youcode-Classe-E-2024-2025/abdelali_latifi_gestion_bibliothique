<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'genre',
        'photo',
        'stock',
    ];

    
    public function loans()
{
    return $this->hasMany(Loans::class, 'book_id');
}


    
}
