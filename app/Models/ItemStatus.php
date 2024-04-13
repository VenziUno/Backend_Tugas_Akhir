<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    use HasFactory;
    protected $table = 'item_statuses';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','name','code'];

    public function bookDetailStatus()
    {
        return $this->hasMany(BookDetailStatus::class, 'item_statuses_id');
    }
}
