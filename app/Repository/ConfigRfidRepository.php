<?php

namespace App\Repository;

use Exception;
use App\Models\User;
use App\Models\ConfigRfid;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class ConfigRfidRepository
{
    function getData($status, $n, $page)
    {
        $data = ConfigRfid::orderBy('id', 'asc');

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

    function getSingleData($id)
    {
        $data = ConfigRfid::find($id);
        return $data;
    }

    function edit($id)
    {
        $validator = Validator::make(request()->all(), [
            'ip' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = ConfigRfid::find($id)->update([
            'ip' => request('ip'),
        ]);
    }

    function delete($id)
    {
        $data = ConfigRfid::find($id)->delete();
    }

}
