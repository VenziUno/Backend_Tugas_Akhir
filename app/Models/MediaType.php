<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    use HasFactory;
    protected $table = 'media_types';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','mrac','code'];

    public function book()
    {
        return $this->hasMany(Book::class, 'media_types_id');
    }
}
