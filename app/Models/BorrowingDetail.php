<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingDetail extends Model
{
    use HasFactory;
    protected $table = 'borrowing_details';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = [
        'id',
        'book_detail_statuses_id',
        'borrowings_id',
        'loan_date',
        'due_date',
        'returned_date',
        'mulct',
        'approval',
        'status'
    ];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class, 'borrowings_id');
    }

    public function bookDetailStatus()
    {
        return $this->belongsTo(BookDetailStatus::class, 'book_detail_statuses_id');
    }
}
