<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    const TABLE_NAME = 'company';
    const ID = 'id';
    const COMPANY_NAME = 'company_name';
    const PHONE_NUMBER = 'phone_number';
    const ALT_PHONE = 'alt_phone';
    const LOGO = 'logo';
    const EMAIL = 'email';
    const ADDRESS = 'address';
    const INTEREST = 'interest';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const logoPath = 'images' . DIRECTORY_SEPARATOR . 'company' . DIRECTORY_SEPARATOR . 'logo';
    const thumbnailLogoPath = 'images' . DIRECTORY_SEPARATOR . 'company' . DIRECTORY_SEPARATOR  . 'logo' . DIRECTORY_SEPARATOR . 'thumbnail';

    const interestPath = 'images' . DIRECTORY_SEPARATOR . 'company' . DIRECTORY_SEPARATOR . 'interest';
    const thumbnailInterestPath = 'images' . DIRECTORY_SEPARATOR . 'company' . DIRECTORY_SEPARATOR  . 'interest' . DIRECTORY_SEPARATOR . 'thumbnail';

    protected $table = self::TABLE_NAME;


    public static function comboList(){
        return self::orderBy('id', 'desc')->get();
    }


    public function setData($data)
    {
        $this->{self::COMPANY_NAME} = $data[self::COMPANY_NAME];
        $this->{self::PHONE_NUMBER} = $data[self::PHONE_NUMBER];
        $this->{self::ALT_PHONE} = $data[self::ALT_PHONE];
        $this->{self::EMAIL} = $data[self::EMAIL];
        $this->{self::ADDRESS} = $data[self::ADDRESS];
    }
}
