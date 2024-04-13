<?php

namespace App\Repository;

use App\Models\BookDetailStatus;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class BorrowingRepository
{
    function getData($status, $n, $page)
    {
        $data = Borrowing::with('bookDetailStatus.book','member')->orderBy('id', 'asc');

        if(request('search')){
            $keyword = request('search');
            $data->where([
                //['status', $status],
                ['name', 'LIKE', "%$keyword%"],
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

    function getBorrowingCountPerMonth()
    {
        $formattedBorrowingCounts = [
            "Jan" => 0,
            "Feb" => 0,
            "Mar" => 0,
            "Apr" => 0,
            "May" => 0,
            "Jun" => 0,
            "Jul" => 0,
            "Aug" => 0,
            "Sep" => 0,
            "Oct" => 0,
            "Nov" => 0,
            "Dec" => 0,
        ];

        $borrowingCounts = BorrowingDetail::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(loan_date) as month'))
            ->groupBy(DB::raw('YEAR(loan_date)'), DB::raw('MONTH(loan_date)'))
            ->get()
            ->toArray();

        foreach ($borrowingCounts as $count) {
            $monthNumber = $count['month'];
            $monthName = Carbon::createFromFormat('m', $monthNumber)->format('M');
            $formattedBorrowingCounts[$monthName] = $count['count'];
        }

        $counts = array_values($formattedBorrowingCounts);

        return $counts;
    }


    function getDataR($status, $n, $page)
    {
        $data = Borrowing::with('bookDetailStatus.book','member')->orderBy('id', 'asc');

        if(request('search')){
            $keyword = request('search');
            $data->where([
                //['status', $status],
                ['name', 'LIKE', "%$keyword%"],
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
        $number = Borrowing::orderBy('id', 'desc')->first();
        if ($number) {
            $slice = substr($number->id,2);
            $sum = (int)$slice + 1;
            $new_number = 'BR' . sprintf("%03d", $sum);
        } else {
            $new_number = 'BR' . sprintf("%03d", 1);
        }
        return $new_number;
    }

    function getSingleData($id)
    {
        $data = Borrowing::find($id);
        return $data;
    }

    function add()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'members_id' => 'required',
            'loan_date' => 'required',
            'due_date' => 'required',
            'isbn_issn' => 'required|array', // Pastikan isbn_issn adalah sebuah array
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Borrowing::create([
            'id' => request('id'),
            'members_id' => request('members_id'),
        ]);

        $isbn_issn_array = request('isbn_issn');

        foreach ($isbn_issn_array as $isbn) {
            $book_detail_status = BookDetailStatus::where('isbn_issn', $isbn)->first();
            if ($book_detail_status) {
                $book_detail_status->update(['item_statuses_id' => 'IS002']);
                BorrowingDetail::create([
                    'borrowings_id' => request('id'),
                    'book_detail_statuses_id' => $book_detail_status->id,
                    'loan_date' => request('loan_date'),
                    'due_date' => request('due_date'),
                    'status' => 'dipinjam',
                ]);
            }
        }

        return $data;
    }


    function edit($id)
    {
        $validator = Validator::make(request()->all(), [
            'due_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Borrowing::find($id)->update([
            'due_date' => request('due_date'),
        ]);
        return $data;
    }

    function delete($id)
    {
        $data = Borrowing::find($id)->delete();
    }

}
