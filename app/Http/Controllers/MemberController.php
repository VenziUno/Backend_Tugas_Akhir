<?php

namespace App\Http\Controllers;

use App\Repository\MemberRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    private $member;

    function __construct()
    {
        $this->member = new MemberRepository;
    }

    function getMember(Request $request)
    {
        $page = $request->page;
        $data = $this->member->getData(1,5,$page);

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
                'message' => "All Data Active Member"
            ]);
        }
    }

    function getMemberCode()
    {
        $data = $this->member->getCode();
        return response([
            'status' => true,
            'code' => $data,
        ]);
    }

    function getSingleMember(Request $request, $id)
    {
        $data = $this->member->getSingleData($id);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Member"
            ]);
        }
    }


    function getSingleMemberRFID(Request $request, $rfid)
    {
        $data = $this->member->getSingleDataRFID($rfid);
        if ($data == null) {
            return response([
                'status' => false,
                 'message' => "No Data"
            ]);
        } else {
            return response([
                'status' => true,
                'data' => $data,
                'message' => "Single Member"
            ]);
        }
    }

    function addMember(Request $request){
        DB::beginTransaction();
        try {
            $data = $this->member->add();
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Add Member"
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

    function editMember(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->member->edit($id);
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Edit Member"
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

    function resetPasswordMember(Request $request, $nis)
    {
        DB::beginTransaction();
        try {
            $data = $this->member->resetPassword($nis);
            DB::commit();
            $message = [
                'status' => true,
                'data' => $data,
                'message' => "Success Edit Member"
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

    function deleteMember($id)
    {
        DB::beginTransaction();
        try {
            $this->member->delete($id);
            DB::commit();
            $message = [
                'status' => true,
                'message' => "Success Delete Member"
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
