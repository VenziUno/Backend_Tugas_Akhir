<?php

namespace App\Repository;

use Exception;
use App\Models\User;
use App\Models\Authorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthorizationRepository
{

    function getData()
    {
        $role_id = request('id');
        $data = Authorization::where('role_id', $role_id)->get();
        return $data;
    }

    function edit()
    {
        // Menghapus semua izin yang memiliki 'role_id' yang sesuai dengan permintaan
        Authorization::where('role_id', request('role_id'))->delete();

        $req = request('otorisasi');
        $temp = [];

        foreach ($req as $val) {
            $exp = explode('_', $val);
            $ar = [
                'role_id' => request('role_id'),
                'menu_id' => $exp[0],
                'sub_menu_id' => $exp[1] === 'null' ? null : $exp[1],
                'authorization_type_id' => $exp[2]
            ];
            $temp[] = $ar;
        }

        // Memasukkan data baru ke dalam database
        Authorization::insert($temp);
    }
}
