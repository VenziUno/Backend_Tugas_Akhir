<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $table = 'places';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name'];

    public function book()
    {
        return $this->hasMany(Book::class, 'places_id');
    }
}
