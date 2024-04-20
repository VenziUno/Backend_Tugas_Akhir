<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id', 'title', 'authors_id',  'statement_of_responsibility', 'edition' , 'specific_detail_info', 'gmds_id', 'content_types_id', 'media_types_id', 'carrier_types_id', 'isbn_issn', 'publishers_id', 'publisher_year', 'places_id', 'collation','series_title', 'call_number', 'subjects_id', 'doc_languages_id', 'desc','opac', 'current_stock', 'file', 'status','labels_id'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'authors_id');
    }

    public function gmd()
    {
        return $this->belongsTo(Gmd::class, 'gmds_id');
    }

    public function contentType()
    {
        return $this->belongsTo(ContentType::class, 'content_types_id');
    }

    public function mediaType()
    {
        return $this->belongsTo(MediaType::class, 'media_types_id');
    }

    public function carrierType()
    {
        return $this->belongsTo(CarrierType::class, 'carrier_types_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publishers_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'places_id');
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class, 'subjects_id');
    }

    public function docLanguage()
    {
        return $this->belongsTo(DocLanguage::class, 'doc_languages_id');
    }

    public function label()
    {
        return $this->belongsTo(Label::class, 'labels_id');
    }

    public function bookDetailStatus()
    {
        return $this->hasMany(BookDetailStatus::class, 'books_id');
    }
}
