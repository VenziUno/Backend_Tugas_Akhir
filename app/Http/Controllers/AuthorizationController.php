<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\AuthorizationRepository;

class AuthorizationController extends Controller
{
    private $authorization;

    function __construct()
    {
        $this->authorization = new AuthorizationRepository;
    }

    function getAuthorization(Request $request)
    {
        $data = $this->authorization->getData();

        if (count($data) == 0) {
            return response([
                'status' => false,
                'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "All Data Otorisasi"
            ]);
        }
    }

    function editAuthorization(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->authorization->edit();
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Berhasil Update"
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
