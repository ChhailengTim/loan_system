<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;
use Log;
use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const logoPath = 'images' . DIRECTORY_SEPARATOR . 'user';
    const thumbnailPath = 'images' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'thumbnail';


    //setData
    public function setData($data)
    {
        $this->username = $data['username'];
        $this->email = $data['email'];
        isset($data['password']) && $this->password = Hash::make($data['password']);
        $this->status = $data['status'];
    }

}
