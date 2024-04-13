<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','birth_year','type'];

    public function book()
    {
        return $this->hasMany(Book::class, 'authors_id');
    }
}
