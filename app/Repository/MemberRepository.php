<?php

namespace App\Repository;

use App\Http\Controllers\CloudinaryStorage;
use Exception;
use App\Models\User;
use App\Models\Member;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class MemberRepository
{
    function getData($status, $n, $page)
    {
        $data = Member::orderBy('id', 'asc');

        // $role = DB::table('roles')->paginate(5);

        if (request('search')) {
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
        $number = Member::orderBy('id', 'desc')->first();
        if ($number) {
            $slice = substr($number->id, 1);
            $sum = (int)$slice + 1;
            $new_number = 'M' . sprintf("%03d", $sum);
        } else {
            $new_number = 'M' . sprintf("%03d", 1);
        }
        return $new_number;
    }

    function getSingleData($id)
    {
        $data = Member::with('user')->find($id);
        return $data;
    }

    function getSingleDataRFID($rfid)
    {
        $data = Member::where('rfid', $rfid)->first();
        return $data;
    }

    function add()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'nis' => 'required',
            'rfid' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'class' => 'required',
            'address' => 'required',
            'portal_code' => 'required',
            // 'file' => 'required',
            'notes' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if (request('file')) {
            $image  = request('file');
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(date('dmY', strtotime(request('date_of_birth')))),
                'role_id' => 'RU003',
            ]);

            $data = Member::create([
                'id' => request('id'),
                'name' => request('name'),
                'nis' => request('nis'),
                'rfid' => request('rfid'),
                'gender' => request('gender'),
                'place_of_birth' => request('place_of_birth'),
                'date_of_birth' => request('date_of_birth'),
                'class' => request('class'),
                'file' => $result,
                'notes' => request('notes'),
                'portal_code' => request('portal_code'),
                'address' => request('address'),
                'status' => request('status'),
                'users_id' => $user->id,
            ]);
        } else {
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(date('dmY', strtotime(request('date_of_birth')))),
                'role_id' => 'RU003',
            ]);

            $data = Member::create([
                'id' => request('id'),
                'name' => request('name'),
                'nis' => request('nis'),
                'rfid' => request('rfid'),
                'gender' => request('gender'),
                'place_of_birth' => request('place_of_birth'),
                'date_of_birth' => request('date_of_birth'),
                'class' => request('class'),
                'notes' => request('notes'),
                'portal_code' => request('portal_code'),
                'address' => request('address'),
                'status' => request('status'),
                'users_id' => $user->id,
            ]);
        }

        return $data;
    }

    function edit($id)
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'nis' => 'required',
            'rfid' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'class' => 'required',
            'address' => 'required',
            'portal_code' => 'required',
            'notes' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Member::find($id);
        $oldFileUrl = $data->file;
        $fileUrl = request('file');
        if ($oldFileUrl === $fileUrl) {

            $user = User::find($data->users_id);
            $user->update([
                'email' => request('email'),
            ]);

            $data->update([
                'name' => request('name'),
                'rfid' => request('rfid'),
                'gender' => request('gender'),
                'nis' => request('nis'),
                'place_of_birth' => request('place_of_birth'),
                'date_of_birth' => request('date_of_birth'),
                'class' => request('class'),
                'address' => request('address'),
                'status' => request('status'),
                'notes' => request('notes'),
                'portal_code' => request('portal_code'),
            ]);
        } else if (request('file')) {
            $urlParts = explode('/', $data->file);
            $publicId = end($urlParts);
            $deleted = CloudinaryStorage::delete($publicId);

            if ($deleted) {
                $image  = request('file');
                $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

                $data = Member::find($id)->update([
                    'name' => request('name'),
                    'rfid' => request('rfid'),
                    'gender' => request('gender'),
                    'nis' => request('nis'),
                    'place_of_birth' => request('place_of_birth'),
                    'date_of_birth' => request('date_of_birth'),
                    'class' => request('class'),
                    'address' => request('address'),
                    'status' => request('status'),
                    'file' => $result,
                    'notes' => request('notes'),
                    'portal_code' => request('portal_code'),
                ]);
            }
        } else {
            $data = Member::create([
                'id' => request('id'),
                'name' => request('name'),
                'nis' => request('nis'),
                'rfid' => request('rfid'),
                'gender' => request('gender'),
                'place_of_birth' => request('place_of_birth'),
                'date_of_birth' => request('date_of_birth'),
                'class' => request('class'),
                'notes' => request('notes'),
                'portal_code' => request('portal_code'),
                'address' => request('address'),
                'status' => request('status'),
            ]);
        }
        return $data;
    }

    public function resetPassword($nis)
    {
        $validator = Validator::make(request()->all(), [
            'nis' => 'required',
            'date_of_birth' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $member = Member::where('nis', $nis)->first();

        // Cocokkan NIS dan tanggal lahir dengan data member
        if ($member->nis !== request('nis') || $member->date_of_birth !== request('date_of_birth')) {
            return response()->json(['error' => 'NIS or date of birth does not match.']);
        }

        // Update password untuk user yang terkait dengan member
        $user = User::find($member->users_id);
        $user->update([
            'password' => Hash::make(date('dmY', strtotime(request('date_of_birth')))),
        ]);

        return response()->json(['message' => 'Password updated successfully.']);
    }


    function delete($id)
    {
        $member = Member::findOrFail($id);
        $userId = $member->users_id;
        DB::beginTransaction();
        $member->delete();
        User::where('id', $userId)->delete();
        DB::commit();
    }
}
