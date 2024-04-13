<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['id','nis','name','email','rfid','gender','place_of_birth','date_of_birth','class','address','portal_code','file','notes','status', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Borrowing()
    {
        return $this->hasMany(Member::class, 'members_id');
    }


}
