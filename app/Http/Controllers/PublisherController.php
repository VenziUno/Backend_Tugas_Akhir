<?php

namespace App\Http\Controllers;

use App\Repository\PublisherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    private $mediaType;

    function __construct()
    {
        $this->mediaType = new PublisherRepository;
    }

    function getPublisher(Request $request)
    {
        $page = $request->page;
        $data = $this->mediaType->getData(1,5,$page);

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
                'message' => "All Data Active Publisher"
            ]);
        }
    }

    function getPublisherCode()
    {
        $data = $this->mediaType->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSinglePublisher(Request $request, $id)
    {
        $data = $this->mediaType->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Publisher"
            ]);
        }
    }

    function addPublisher(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->mediaType->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add Publisher"
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

    function editPublisher(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->mediaType->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Edit Publisher"
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

    function deletePublisher($id)
    {
        DB::beginTransaction();
        try {
            $this->mediaType->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete Publisher"
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
