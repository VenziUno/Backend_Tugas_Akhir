<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Repository\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    private $book;

    function __construct()
    {
        $this->book = new BookRepository;
    }

    function getBook(Request $request)
    {
        $page = $request->page;
        $data = $this->book->getData(1,5,$page);

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
        $data = $this->book->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleBook(Request $request, $id)
    {
        $data = $this->book->getSingleData($id);
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

    function addBook(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->book->add();
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
            $data = $this->book->edit($id);
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
            $this->book->delete($id);
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
