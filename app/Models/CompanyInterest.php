<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInterest extends Model
{
    use HasFactory;

    const TABLE_NAME = 'company_interest';
    const ID = 'id';
    const COMPANY_ID = 'company_id';
    const MONTH = 'month';
    const INTEREST = 'interest';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = self::TABLE_NAME;

    public function setData($data)
    {
        $this->{self::COMPANY_ID} = $data[self::COMPANY_ID];
        $this->{self::MONTH} = $data[self::MONTH];
        $this->{self::INTEREST} = $data[self::INTEREST];
    }
}
