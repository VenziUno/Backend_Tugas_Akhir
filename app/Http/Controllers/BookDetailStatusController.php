<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Repository\BookDetailStatusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookDetailStatusController extends Controller
{
    private $bookDetailStatus;

    function __construct()
    {
        $this->bookDetailStatus = new BookDetailStatusRepository;
    }


    function getBooks(Request $request)
    {
        $page = $request->page;
        $data = $this->bookDetailStatus->getDataBorrowing(1, 5, $page);

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
                'message' => "All Data Active Book "
            ]);
        }
    }

    function getBook(Request $request, $bookId)
    {
        $page = $request->page;
        $data = $this->bookDetailStatus->getData(1, 5, $page, $bookId);

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
                'message' => "All Data Active Book "
            ]);
        }
    }

    function getBookCode()
    {
        $data = $this->bookDetailStatus->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleBookTransaksi(Request $request, $id)
    {
        $data = $this->bookDetailStatus->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Book "
            ]);
        }
    }

    function getSingleBookSign(Request $request, $ibsn_issn)
    {
        $data = $this->bookDetailStatus->getSingleDataTransaksi($ibsn_issn);
        if ($data == null) {
            return response([
                'status' => false,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Book "
            ]);
        }
    }

    function addBook(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $this->bookDetailStatus->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add Book "
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

    function editBook(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->bookDetailStatus->edit($id);
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

    function deleteBook($id)
    {
        DB::beginTransaction();
        try {
            $this->bookDetailStatus->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete Book "
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
