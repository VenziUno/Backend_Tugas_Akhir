<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfidData extends Model
{
    use HasFactory;
    protected $table = 'rfid_datas';
    // public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['ip'];
}
