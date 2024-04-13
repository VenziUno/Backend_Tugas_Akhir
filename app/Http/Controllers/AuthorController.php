<?php

namespace App\Http\Controllers;

use App\Repository\AuthorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    private $author;

    function __construct()
    {
        $this->author = new AuthorRepository;
    }

    function getAuthor(Request $request)
    {
        $page = $request->page;
        $data = $this->author->getData(1,5,$page);

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
                'message' => "All Data Active Author"
            ]);
        }
    }

    function getAuthorCode()
    {
        $data = $this->author->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleAuthor(Request $request, $id)
    {
        $data = $this->author->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Author"
            ]);
        }
    }

    function addAuthor(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->author->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add Author"
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

    function editAuthor(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->author->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Edit Author"
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

    function deleteAuthor($id)
    {
        DB::beginTransaction();
        try {
            $this->author->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete Author"
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
