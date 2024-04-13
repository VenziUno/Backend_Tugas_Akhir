<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;
    protected $table = 'content_types';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','mrac','code'];

    public function book()
    {
        return $this->hasMany(Book::class, 'content_types_id');
    }
}
