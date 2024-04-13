<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $table = 'borrowings';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = [
        'id',
        'members_id',
        'isbn_issn',
    ];

    public function borrowingDetail()
    {
        return $this->hasMany(BookDetailStatus::class, 'borrowings_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'members_id');
    }
}
