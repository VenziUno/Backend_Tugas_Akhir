<?php

namespace App\Repository;

use App\Http\Controllers\CloudinaryStorage;
use Exception;
use App\Models\User;
use App\Models\Book;
use App\Models\BookDetailStatus;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class BookRepository
{
    function getData($status, $n, $page)
    {
        $data = Book::with('author', 'gmd', 'contentType', 'mediaType', 'carrierType', 'publisher', 'place', 'subject', 'docLanguage', 'label', 'bookDetailStatus.itemStatus')->orderBy('id', 'asc');

        if (request('search')) {
            $keyword = request('search');
            $data->where([
                //['status', $status],
                ['title', 'LIKE', "%$keyword%"],
            ])->orWhere([
                //['status', $status],
                ['id', 'LIKE', "%$keyword%"],
            ]);
        }
        if (request()->has('doclanguage')&& request('doclanguage') !== 'undefined') {
            $languages = explode(',', request('doclanguage'));
            $data->whereIn('doc_languages_id', $languages);
        }

        if (request('callnumber')&& request('callnumber') !== 'undefined') {
            $languages = explode(',', request('callnumber'));
            $data->whereIn('call_number', $languages);
        }

        if (request('subject')&& request('subject') !== 'undefined') {
            $languages = explode(',', request('subject'));
            $data->whereIn('subjects_id', $languages);
        }

        if (request('gmdSearch')&& request('gmdSearch') !== 'undefined') {
            $languages = explode(',', request('gmdSearch'));
            $data->whereIn('gmds_id', $languages);
        }

        if (request('gmdSearch')&& request('gmdSearch') !== 'undefined') {
            $languages = explode(',', request('gmdSearch'));
            $data->whereIn('gmds_id', $languages);
        }

        if (request('label')&& request('label') !== 'undefined') {
            $languages = explode(',', request('label'));
            $data->whereIn('labels_id', $languages);
        }

        if ($page) {
            $data = $data->paginate($n, ['*'], 'page', $page);
        } else {
            $data = $data->get();
        }
        return $data;
    }

    function getCode()
    {
        $number = Book::orderBy('id', 'desc')->first();
        if ($number) {
            $slice = substr($number->id, 2);
            $sum = (int)$slice + 1;
            $new_number = 'BD' . sprintf("%03d", $sum);
        } else {
            $new_number = 'BD' . sprintf("%03d", 1);
        }
        return $new_number;
    }

    function getSingleData($id)
    {
        $data = Book::with('author', 'gmd', 'contentType', 'mediaType', 'carrierType', 'publisher', 'place', 'subject', 'docLanguage', 'label', 'bookDetailStatus.itemStatus')->find($id);
        return $data;
    }

    function add()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'title' => 'required',
            'authors_id' => 'required',
            'gmds_id'  => 'required',
            'publishers_id'  => 'required',
            'publisher_year'  => 'required',
            'places_id'  => 'required',
            'file'  => 'required',
            'opac'  => 'required',
            'labels_id'  => 'required',
            'current_stock' => 'required',
            'isbn_issn'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if (request('file')) {
            $image  = request('file');
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
            $data = Book::create([
                'id' => request('id'),
                'title' => request('title'),
                'authors_id' => request('authors_id'),
                'statement_of_responsibility' => request('statement_of_responsibility'),
                'edition' => request('edition'),
                'specific_detail_info' => request('specific_detail_info'),
                'gmds_id' => request('gmds_id'),
                'isbn_issn' => request('isbn_issn'),
                'content_types_id' => request('content_types_id'),
                'media_types_id' => request('media_types_id'),
                'carrier_types_id' => request('carrier_types_id'),
                'publishers_id' => request('publishers_id'),
                'publisher_year' => request('publisher_year'),
                'collation' => request('collation'),
                'series_title' => request('series_title'),
                'call_number' => request('call_number'),
                'places_id' => request('places_id'),
                'subjects_id' => request('subjects_id'),
                'doc_languages_id' => request('doc_languages_id'),
                'desc' => request('desc'),
                'opac' => request('opac'),
                'labels_id' => request('labels_id'),
                'file' => $result,
                'current_stock' => request('current_stock'),
            ]);

            $isbn_issn = request('isbn_issn');
            $current_stock = request('current_stock');

            for ($i = 1; $i <= $current_stock; $i++) {
                $new_isbn_issn = $isbn_issn . str_pad($i, 3, '0', STR_PAD_LEFT);
                BookDetailStatus::create([
                    'isbn_issn' => $new_isbn_issn,
                    'item_statuses_id' => 'IS001',
                    'books_id' => $data->id,
                ]);
            }
        }
        return $data;
    }

    function edit($id)
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'title' => 'required',
            'authors_id' => 'required',
            'gmds_id'  => 'required',
            'publishers_id'  => 'required',
            'publisher_year'  => 'required',
            'places_id'  => 'required',
            'opac'  => 'required',
            'labels_id'  => 'required',
            'current_stock' => 'required',
            'isbn_issn'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Book::find($id);

        $oldFileUrl = $data->file;
        $fileUrl = request('file');
        $oldCurrentStock = $data->current_stock;
        $oldIsbnIssn = $data->isbn_issn;

        if ($oldFileUrl === $fileUrl) {
            $data->update(request()->except(['id', 'file']));
        } else {
            $urlParts = explode('/', $data->file);
            $publicId = end($urlParts);
            $deleted = CloudinaryStorage::delete($publicId);

            if ($deleted) {
                $image  = request('file');
                $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

                $data->update(array_merge(
                    request()->except(['id', 'file']),
                    ['file' => $result]
                ));
            }
        }

        $isbn_issn = request('isbn_issn');
        $current_stock = request('current_stock');

        if ($data->isbn_issn != $oldIsbnIssn || $data->current_stock < $oldCurrentStock) {
            BookDetailStatus::where('books_id', $id)->delete();
            for ($i = 1; $i <= $current_stock; $i++) {
                $new_isbn_issn = $isbn_issn . str_pad($i, 3, '0', STR_PAD_LEFT);
                BookDetailStatus::create([
                    'isbn_issn' => $new_isbn_issn,
                    'item_statuses_id' => 'IS001',
                    'books_id' => $id,
                ]);
            }
        } else if ($data->current_stock > $oldCurrentStock) {
            for ($i = $oldCurrentStock + 1; $i <= $current_stock; $i++) {
                $new_isbn_issn = $isbn_issn . str_pad($i, 3, '0', STR_PAD_LEFT);
                BookDetailStatus::create([
                    'isbn_issn' => $new_isbn_issn,
                    'item_statuses_id' => 'IS001',
                    'books_id' => $id,
                ]);
            }
        }

        return $data;
    }

    function delete($id)
    {
        BookDetailStatus::where('books_id', $id)->delete();
        $data = Book::find($id)->delete();
    }
}
