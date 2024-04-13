<?php

namespace App\Http\Controllers;

use App\Repository\BorrowingDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingDetailController extends Controller
{
    private $borrowingDetail;

    function __construct()
    {
        $this->borrowingDetail = new BorrowingDetailRepository;
    }

    function getBorrowingDetail(Request $request)
    {
        $page = $request->page;
        $data = $this->borrowingDetail->getData(1,5,$page);

        if (count($data) == 0) {
            return response([
                'status' => false,
                'data' => $data,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "All Data Active BorrowingDetail"
            ]);
        }
    }

    function getBorrowingDetailReport(Request $request)
    {
        $page = $request->page;
        $data = $this->borrowingDetail->getDataReport(1,5,$page);

        if (count($data) == 0) {
            return response([
                'status' => false,
                'data' => $data,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "All Data Active BorrowingDetail"
            ]);
        }
    }

    function getBorrowingMember(Request $request, $member)
    {
        $page = $request->page;
        $data = $this->borrowingDetail->getDataMember(1,5,$page,$member);

        if (count($data) == 0) {
            return response([
                'status' => false,
                'data' => $data,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "All Data Active BorrowingDetail"
            ]);
        }
    }

    function getBorrowingDetailCode()
    {
        $data = $this->borrowingDetail->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleBorrowingDetail(Request $request, $id)
    {
        $data = $this->borrowingDetail->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single BorrowingDetail"
            ]);
        }
    }

    function addBorrowingDetail(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->borrowingDetail->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add BorrowingDetail"
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

    function editBorrowingDetail(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->borrowingDetail->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Edit BorrowingDetail"
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

    function editBookReturn(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->borrowingDetail->editReturn($id);
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Edit Book"
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

    function editBookExtension(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->borrowingDetail->editExtension($id);
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Edit Book"
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

    function editBookExtensionMember(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->borrowingDetail->editExtensionMember($id);
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Edit Book"
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

    function deleteBorrowingDetail($id)
    {
        DB::beginTransaction();
        try {
            $this->borrowingDetail->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete BorrowingDetail"
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
