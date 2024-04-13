<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','classification_code','subjects_type'];

    public function book()
    {
        return $this->hasMany(Book::class, 'subjects_id');
    }
}
