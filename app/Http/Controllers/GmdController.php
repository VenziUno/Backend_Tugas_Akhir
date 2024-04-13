<?php

namespace App\Http\Controllers;

use App\Repository\GmdRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GmdController extends Controller
{
    private $role;

    function __construct()
    {
        $this->role = new GmdRepository;
    }

    function getGmd(Request $request)
    {
        $page = $request->page;
        $data = $this->role->getData(1,5,$page);

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
                'message' => "All Data Active Gmd"
            ]);
        }
    }

    function getGmdCode()
    {
        $data = $this->role->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleGmd(Request $request, $id)
    {
        $data = $this->role->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Gmd"
            ]);
        }
    }

    function addGmd(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->role->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add Gmd"
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

    function editGmd(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->role->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Edit Gmd"
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

    function deleteGmd($id)
    {
        DB::beginTransaction();
        try {
            $this->role->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete Gmd"
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
