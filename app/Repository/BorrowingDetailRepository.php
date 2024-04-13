<?php

namespace App\Repository;

use App\Models\BookDetailStatus;
use Carbon\Carbon;
use Exception;
use App\Models\User;
use App\Models\BorrowingDetail;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class BorrowingDetailRepository
{
    function getData($status, $n, $page)
    {
        $data = BorrowingDetail::with('bookDetailStatus.book', 'borrowing.member')->WhereNull('returned_date')->orderBy('id', 'asc');

        if (request('search')) {
            $keyword = request('search');
            $data->where(function ($query) use ($keyword) {
                $query->whereHas('bookDetailStatus', function ($subQuery) use ($keyword) {
                    $subQuery->where('isbn_issn', 'LIKE', "%$keyword%");
                })->orWhere('id', 'LIKE', "%$keyword%");
            });
        }

        if ($page) {
            $data = $data->paginate($n, ['*'], 'page', $page);
        } else {
            $data = $data->get();
        };

        return $data;
    }

    function getDataMember($status, $n, $page,$memberId)
    {
        $data = BorrowingDetail::with('bookDetailStatus.book', 'borrowing.member')->WhereNull('returned_date')->orderBy('id', 'asc');

        if ($memberId) {
            $data->whereHas('borrowing.member', function ($query) use ($memberId) {
                $query->where('members_id', $memberId);
            });
        }

        if (request('search')) {
            $keyword = request('search');
            $data->where(function ($query) use ($keyword) {
                $query->whereHas('bookDetailStatus', function ($subQuery) use ($keyword) {
                    $subQuery->where('isbn_issn', 'LIKE', "%$keyword%");
                })->orWhere('id', 'LIKE', "%$keyword%");
            });
        }

        if ($page) {
            $data = $data->paginate($n, ['*'], 'page', $page);
        } else {
            $data = $data->get();
        };

        return $data;
    }

    function getDataReport($status, $n, $page)
    {
        $data = BorrowingDetail::with('bookDetailStatus.book', 'borrowing.member')->orderBy('id', 'asc');

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
        };

        return $data;
    }


    function getCode()
    {
        $number = BorrowingDetail::orderBy('id', 'desc')->first();
        if ($number) {
            $slice = substr($number->id, 2);
            $sum = (int)$slice + 1;
            $new_number = 'BRD' . sprintf("%03d", $sum);
        } else {
            $new_number = 'BRD' . sprintf("%03d", 1);
        }
        return $new_number;
    }

    function getSingleData($id)
    {
        $data = BorrowingDetail::find($id);
        return $data;
    }

    function add()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'members_id' => 'required',
            'loan_date' => 'required',
            'due_date' => 'required',
            'isbn_issn' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = BorrowingDetail::create([
            'id' => request('id'),
            'members_id' => request('members_id'),
        ]);

        $isbn_issn_array = request('isbn_issn');

        foreach ($isbn_issn_array as $isbn) {
            $book_detail_status = BookDetailStatus::where('isbn_issn', $isbn)->first();

            if ($book_detail_status) {
                $book_detail_status->update([
                    'borrowings_id' => request('id'),
                    'item_statuses_id' => "IS002",
                    'loan_date' => request('loan_date'),
                    'due_date' => request('due_date'),
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

        $data = BorrowingDetail::find($id)->update([
            'due_date' => request('due_date'),
        ]);
        return $data;
    }

    function editReturn($id)
    {
        $validator = Validator::make(request()->all(), [
            'returned_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $borrowingDetail = BorrowingDetail::find($id);

        if (!$borrowingDetail) {
            return response()->json(['error' => 'Borrowing detail not found'], 404);
        }

        $bookDetailStatus = $borrowingDetail->bookDetailStatus;

        if (!$bookDetailStatus) {
            return response()->json(['error' => 'Book detail status not found'], 404);
        }

        $bookDetailStatus->update([
            'item_statuses_id' => 'IS001',
        ]);

        if (request('mulct')) {
            $updateResult = $borrowingDetail->update([
                'returned_date' => request('returned_date'),
                'mulct' => request('mulct'),
                'status' => 'dikembalikan',
            ]);
        }else {
            $updateResult = $borrowingDetail->update([
                'returned_date' => request('returned_date'),
                'status' => 'dikembalikan',
            ]);
        }


        return response()->json(['message' => 'Borrowing detail updated successfully', 'data' => $updateResult]);
    }

    function editExtension($id)
    {
        $validator = Validator::make(request()->all(), [
            'due_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $approval = request('approval');

        if ($approval === null || $approval === "underfined") {
            $data = BorrowingDetail::find($id)->update([
                'due_date' => request('due_date'),
            ]);
        } elseif ($approval == 1) {
            $data = BorrowingDetail::find($id)->update([
                'due_date' => request('due_date'),
                'approval' => 0,
            ]);
        }

        return $data;
    }

    function editExtensionMember($id)
    {
        $validator = Validator::make(request()->all(), [
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = BorrowingDetail::find($id)->update([
            'approval' => 1,
        ]);

        return $data;
    }

    function delete($id)
    {
        $data = BorrowingDetail::find($id)->delete();
    }
}
