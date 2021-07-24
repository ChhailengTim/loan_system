<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use HasFactory, SoftDeletes;

    const TABLE_NAME = 'borrower';
    const ID = 'id';
    const COMPANY_ID = 'company_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const GENDER = 'gender';
    const DOB = 'dob';
    const ADDRESS = 'address';
    const PHONE = 'phone';
    const EMAIL = 'email';
    const ALT_PHONE = 'alt_phone';
    const PHOTO = 'photo';
    const NATIONAL_ID_PHOTO = 'national_id_photo';
    const BUSINESS_NAME = 'business_name';
    const SALARY_INVOICE = 'salary_invoice';
    const MORTGAGE = 'mortgage';
    const FAMILY_BOOK = 'family_book';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //Image path for photo
    const photoPath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR . 'photo';
    const thumbnailLogoPath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR  . 'photo' . DIRECTORY_SEPARATOR . 'thumbnail';

    //Image path for national_id_photo
    const nationalPath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR . 'national_id_photo';
    const thumbnailNationalPath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR  . 'national_id_photo' . DIRECTORY_SEPARATOR . 'thumbnail';


    //Image path for salary_invoice
    const salaryInvoicePath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR . 'salary_invoice';
    const thumbnailSalaryInvoicePath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR  . 'salary_invoice' . DIRECTORY_SEPARATOR . 'thumbnail';


    //Image path for mortgage
    const mortgagePath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR . 'mortgage';
    const thumbnailMortgagePath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR  . 'mortgage' . DIRECTORY_SEPARATOR . 'thumbnail';


    //Image path for family_book
    const familyBookPath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR . 'family_book';
    const thumbnailFamilyBookPath = 'images' . DIRECTORY_SEPARATOR . 'borrower' . DIRECTORY_SEPARATOR  . 'family_book' . DIRECTORY_SEPARATOR . 'thumbnail';

    protected $table = self::TABLE_NAME;


    public static function comboList(){
        return self::orderBy('id', 'desc')->get();
    }


    public function setData($data)
    {
        $this->{self::COMPANY_ID} = $data[self::COMPANY_ID];
        $this->{self::FIRST_NAME} = $data[self::FIRST_NAME];
        $this->{self::LAST_NAME} = $data[self::LAST_NAME];
        $this->{self::GENDER} = $data[self::GENDER];
        $this->{self::DOB} = $data[self::DOB];
        $this->{self::ADDRESS} = $data[self::ADDRESS];
        $this->{self::EMAIL} = $data[self::EMAIL];
        $this->{self::PHONE} = $data[self::PHONE];
        $this->{self::ALT_PHONE} = $data[self::ALT_PHONE];
        $this->{self::PHOTO} = $data[self::PHOTO];
        $this->{self::NATIONAL_ID_PHOTO} = $data[self::NATIONAL_ID_PHOTO];
        $this->{self::BUSINESS_NAME} = $data[self::BUSINESS_NAME];
        $this->{self::SALARY_INVOICE} = $data[self::SALARY_INVOICE];
        $this->{self::MORTGAGE} = $data[self::MORTGAGE];
        $this->{self::FAMILY_BOOK} = $data[self::FAMILY_BOOK];
    }
}
