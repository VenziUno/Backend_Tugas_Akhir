<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gmd extends Model
{
    use HasFactory;
    protected $table = 'gmds';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','code'];

    public function book()
    {
        return $this->hasMany(Book::class, 'gmds_id');
    }
}

