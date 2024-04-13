<?php

namespace App\Repository;

use Exception;
use App\Models\User;
use App\Models\MediaType;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class MediaTypeRepository
{
    function getData($status, $n, $page)
    {
        $data = MediaType::orderBy('id', 'asc');

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
        $number = MediaType::orderBy('id', 'desc')->first();
        if ($number) {
            $slice = substr($number->id,2);
            $sum = (int)$slice + 1;
            $new_number = 'MT' . sprintf("%03d", $sum);
        } else {
            $new_number = 'MT' . sprintf("%03d", 1);
        }
        return $new_number;
    }

    function getSingleData($id)
    {
        $data = MediaType::find($id);
        return $data;
    }

    function add()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = MediaType::create([
            'id' => request('id'),
            'name' => request('name'),
            'code' => request('code'),
            'mrac' => request('mrac'),
        ]);

        return $data;
    }

    function edit($id)
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = MediaType::find($id)->update([
            'name' => request('name'),
            'code' => request('code'),
            'mrac' => request('mrac')
        ]);
    }

    function delete($id)
    {
        $data = MediaType::find($id)->delete();
    }

}
