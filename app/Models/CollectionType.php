<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionType extends Model
{
    use HasFactory;
    protected $table = 'collection_types';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name'];
}
