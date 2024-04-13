<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocLanguage extends Model
{
    use HasFactory;
    protected $table = 'doc_languages';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name'];

    public function book()
    {
        return $this->hasMany(Book::class, 'doc_languages_id');
    }
}
