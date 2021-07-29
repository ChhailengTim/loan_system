<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    const TABLE_NAME = 'loan';
    const ID = 'id';
    const BORROWER_ID = 'borrower_id';
    const REQUEST_AMOUNT = 'request_amount';
    const TERM = 'term';
    const INTEREST = 'interest';
    const OUTSTANDING_AMOUNT = 'outstanding_amount';
    const appointment_date = 'appointment_date';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::TABLE_NAME;


    public static function comboList(){
        return self::orderBy('id', 'desc')->get();
    }


    public function setData($data)
    {
        $this->{self::BORROWER_ID} = $data[self::BORROWER_ID];
        $this->{self::REQUEST_AMOUNT} = $data[self::REQUEST_AMOUNT];
        $this->{self::TERM} = $data[self::TERM];
        $this->{self::INTEREST} = $data[self::INTEREST];
        $this->{self::OUTSTANDING_AMOUNT} = $data[self::OUTSTANDING_AMOUNT];
    }
}
