<?php

namespace App\Http\Controllers;

use App\Repository\ConfigRfidRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigRfidController extends Controller
{
    private $configRfid;

    function __construct()
    {
        $this->configRfid = new ConfigRfidRepository;
    }

    function getConfigRfid(Request $request)
    {
        $page = $request->page;
        $data = $this->configRfid->getData(1,5,$page);

        if (count($data) == 0) {
            return response([
                'status' => false,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "All Data Active ConfigRfid"
            ]);
        }
    }

    function getSingleConfigRfid(Request $request, $id)
    {
        $data = $this->configRfid->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single ConfigRfid"
            ]);
        }
    }

    function editConfigRfid(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->configRfid->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Edit ConfigRfid"
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

}
