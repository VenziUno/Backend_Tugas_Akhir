<?php

namespace App\Repository;

use Exception;
use App\Models\User;
use App\Models\BookDetailStatus;
use App\Models\Borrowing;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class BookDetailStatusRepository
{
    function getData($status, $n, $page, $bookId)
    {
        $query = BookDetailStatus::with('itemStatus','book.author')->where('books_id', $bookId);

        $data = $query->orderBy('id', 'asc');

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

        if ($page) {
            $data = $data->paginate($n, ['*'], 'page', $page);
        } else {
            $data = $data->get();
        }
        return $data;
    }

    function getDataBorrowing($status, $n, $page)
    {
        $query = BookDetailStatus::with('borrowing.member','book','itemStatus')->whereNotNull('borrowings_id');

        $data = $query->orderBy('id', 'asc');

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

        if ($page) {
            $data = $data->paginate($n, ['*'], 'page', $page);
        } else {
            $data = $data->get();
        }
        return $data;
    }


    function getCode()
    {
        $number = BookDetailStatus::orderBy('id', 'desc')->first();
        if ($number) {
            $slice = substr($number->id,2);
            $sum = (int)$slice + 1;
            $new_number = 'RU' . sprintf("%03d", $sum);
        } else {
            $new_number = 'RU' . sprintf("%03d", 1);
        }
        return $new_number;
    }

    function getSingleData($id)
    {
        $data = BookDetailStatus::with('itemStatus','book')->find($id);
        return $data;
    }

    function getSingleDataTransaksi($isbn_issn)
    {
        $data = BookDetailStatus::with('itemStatus','book')
        ->where('isbn_issn', $isbn_issn)->first();
        return $data;
    }

    function add()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = BookDetailStatus::create([
            'id' => request('id'),
            'name' => request('name'),
            'status' => request('status'),
        ]);

        return $data;
    }

    function edit($id)
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'isbn_issn' => 'required',
            'item_statuses_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = BookDetailStatus::find($id)->update([
            'isbn_issn' => request('isbn_issn'),
            'item_statuses_id' => request('item_statuses_id')
        ]);
    }

    function delete($id)
    {
        $data = BookDetailStatus::find($id)->delete();
    }

}
