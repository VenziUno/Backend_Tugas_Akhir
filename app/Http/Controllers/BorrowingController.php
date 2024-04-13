<?php

namespace App\Http\Controllers;

use App\Repository\BorrowingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    private $borrowing;

    function __construct()
    {
        $this->borrowing = new BorrowingRepository;
    }

    function getBorrowing(Request $request)
    {
        $page = $request->page;
        $data = $this->borrowing->getData(1,5,$page);

        if (count($data) == 0) {
            return response([
                'status' => false,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "All Data Active Borrowing"
            ]);
        }
    }


    function getBorrowingReport(Request $request)
    {
        $page = $request->page;
        $data = $this->borrowing->getBorrowingCountPerMonth(1,5,$page);

        if (count($data) == 0) {
            return response([
                'status' => false,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "All Data Active Borrowing"
            ]);
        }
    }


    function getBorrowingCode()
    {
        $data = $this->borrowing->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleBorrowing(Request $request, $id)
    {
        $data = $this->borrowing->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Borrowing"
            ]);
        }
    }

    function addBorrowing(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->borrowing->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add Borrowing"
            ];
        } catch (\Exception $exception) {
            DB::rollback();
            $message = [
                'status' => false,
                'error' => $exception->getMessage()
            ];
        }
        return response()->json($message);
    }

    function editBorrowing(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->borrowing->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Edit Borrowing"
            ];
        } catch (\Exception $exception) {
            DB::rollback();
            $message = [
                'status' => false,
                'error' => $exception->getMessage()
            ];
        }
        return response()->json($message);
    }

    function deleteBorrowing($id)
    {
        DB::beginTransaction();
        try {
            $this->borrowing->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete Borrowing"
            ];
        } catch (\Exception $exception) {
            DB::rollback();
            $message = [
                'status' => false,
                'error' => "Something Wrong"
            ];
        }
        return response()->json($message);
    }
}
