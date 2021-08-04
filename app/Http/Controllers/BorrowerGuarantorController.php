<?php

namespace App\Http\Controllers;

use App\Models\BorrowerGuarantor;
use Illuminate\Http\Request;

class BorrowerGuarantorController extends Controller
{
    //Get
    public function get(Request $request){

        $tableSize = empty($request->input('table_size')) ? 10 : $request->input('table_size');

        $data = BorrowerGuarantor::join('borrower', 'borrower.id', 'borrower_guarantor.borrower_id')
            ->join('company', 'company.id', 'borrower.company_id')
            ->select(
                'borrower_guarantor.id as id',
                'company.id as company_id',
                'company.company_name',
                'borrower_guarantor.first_name',
                'borrower_guarantor.last_name',
                'borrower_guarantor.gender',
                'borrower_guarantor.dob',
                'borrower_guarantor.business_name',
                'borrower_guarantor.email',
                'borrower_guarantor.phone',
                'borrower_guarantor.alt_phone',
                'borrower_guarantor.address',
                'borrower_guarantor.photo',
                'borrower_guarantor.national_id_photo',
                'borrower_guarantor.salary_invoice',
                'borrower_guarantor.mortgage',
                'borrower.id as borrower_id',
                'borrower.first_name as borrower_first_name',
                'borrower.last_name as borrower_last_name',
                'borrower.gender as borrower_gender',
                'borrower.dob as borrower_dob',
                'borrower.business_name as borrower_business_name',
                'borrower.email as borrower_email',
                'borrower.phone as borrower_phone',
                'borrower.alt_phone as borrower_alt_phone',
                'borrower.address as borrower_address',
                'borrower.photo as borrower_photo',
                'borrower.national_id_photo as borrower_national_photo',
                'borrower.salary_invoice as borrower_salary_invoice',
                'borrower.mortgage as borrower_mortgage',
                'borrower.family_book as borrower_family_book',
            )
            ->orderBy('borrower_guarantor.id', 'desc')
            ->paginate($tableSize);

        return $this->responseWithPagination($data);
    }
}
