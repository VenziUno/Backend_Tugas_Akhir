<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name'];

    public function book()
    {
        return $this->hasMany(Book::class, 'publishers_id');
    }
}
