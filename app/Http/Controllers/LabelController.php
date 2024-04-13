<?php

namespace App\Http\Controllers;

use App\Repository\LabelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    private $mediaType;

    function __construct()
    {
        $this->mediaType = new LabelRepository;
    }

    function getLabel(Request $request)
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
                'message' => "All Data Active Label"
            ]);
        }
    }

    function getLabelCode()
    {
        $data = $this->mediaType->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleLabel(Request $request, $id)
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
                'message' => "Single Label"
            ]);
        }
    }

    function addLabel(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->mediaType->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add Label"
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

    function editLabel(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->mediaType->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Edit Label"
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

    function deleteLabel($id)
    {
        DB::beginTransaction();
        try {
            $this->mediaType->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete Label"
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
