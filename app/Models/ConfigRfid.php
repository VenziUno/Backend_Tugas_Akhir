<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigRfid extends Model
{
    use HasFactory;
    protected $table = 'config_rfids';
    // public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['ip'];
}
