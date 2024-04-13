<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierType extends Model
{
    use HasFactory;
    protected $table = 'carrier_types';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','mrac','code'];

    public function book()
    {
        return $this->hasMany(Book::class, 'carrier_types_id');
    }
}
