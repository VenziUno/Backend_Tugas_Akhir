<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetailStatus extends Model
{
    use HasFactory;
    protected $table = 'book_detail_statuses';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = [
        'id',
        'item_statuses_id',
        'isbn_issn',
        'books_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'books_id');
    }

    public function itemStatus()
    {
        return $this->belongsTo(ItemStatus::class, 'item_statuses_id');
    }

    public function borrowingDetail()
    {
        return $this->hasMany(BookDetailStatus::class, 'borrowings_id');
    }
}
