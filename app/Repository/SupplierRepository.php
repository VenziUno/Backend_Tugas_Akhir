<?php

namespace App\Repository;

use Exception;
use App\Models\User;
use App\Models\Supplier;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class SupplierRepository
{
    function getData($status, $n, $page)
    {
        $data = Supplier::orderBy('id', 'asc');

        // $role = DB::table('roles')->paginate(5);

        if(request('search')){
            $keyword = request('search');
            $data->where([
                //['status', $status],
                ['name', 'LIKE', "%$keyword%"],
            ])->orWhere([
                //['status', $status],
                ['id', 'LIKE', "%$keyword%"],
            ]);
        }

        if ($page) {
            $data = $data->paginate($n, ['*'], 'page', $page);
        } else {
            $data = $data->get();
        }
        return $data;
    }

    function getCode()
    {
        $number = Supplier::orderBy('id', 'desc')->first();
        if ($number) {
            $slice = substr($number->id,1);
            $sum = (int)$slice + 1;
            $new_number = 'S' . sprintf("%03d", $sum);
        } else {
            $new_number = 'S' . sprintf("%03d", 1);
        }
        return $new_number;
    }

    function getSingleData($id)
    {
        $data = Supplier::find($id);
        return $data;
    }

    function add()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'portal_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Supplier::create([
            'id' => request('id'),
            'name' => request('name'),
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'portal_code' => request('portal_code'),
        ]);

        return $data;
    }

    function edit($id)
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'portal_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Supplier::find($id)->update([
            'name' => request('name'),
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'portal_code' => request('portal_code'),
        ]);
    }

    function delete($id)
    {
        $data = Supplier::find($id)->delete();
    }

}
