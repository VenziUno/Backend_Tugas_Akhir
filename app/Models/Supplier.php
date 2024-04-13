<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','address','phone_number','portal_code'];
}
