<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Borrower;
use App\Models\BorrowerGuarantor;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    //request loan
    public function requestLoan(Request $request){

        //Insert Borrower
        $borrower_data = [
            Borrower::COMPANY_ID => $request->input('company_id'),
            Borrower::FIRST_NAME => $request->input('borrower_first_name'),
            Borrower::LAST_NAME => $request->input('borrower_last_name'),
            Borrower::GENDER => $request->input('borrower_gender'),
            Borrower::DOB => $request->input('borrower_dob'),
            Borrower::EMAIL => $request->input('borrower_email'),
            Borrower::PHONE => $request->input('borrower_phone'),
            Borrower::ALT_PHONE => $request->input('borrower_alt_phone'),
            Borrower::ADDRESS => $request->input('borrower_address'),
            Borrower::BUSINESS_NAME => $request->input('borrower_business_name')
        ];

        $borrower = new Borrower();
        $borrower->setData($borrower_data);
        if($borrower->save()){
            // Upload Photo
            if ($request['borrower_photo'] != null){
                $photo = StringHelper::uploadImage($request['borrower_photo'], Borrower::photoPath, Borrower::thumbnailPhotoPath);
                $borrower->photo = $photo;
                $borrower->save();
            }

            // Upload National
            if ($request['borrower_national_photo'] != null){
                $national_photo = StringHelper::uploadImage($request['borrower_national_photo'], Borrower::nationalPath, Borrower::thumbnailNationalPath);
                $borrower->national_id_photo = $national_photo;
                $borrower->save();
            }

            // Upload Salary Invoice
            if ($request['borrower_salary_invoice'] != null){
                $salary_invoice = StringHelper::uploadImage($request['borrower_salary_invoice'], Borrower::salaryInvoicePath, Borrower::thumbnailSalaryInvoicePath);
                $borrower->salary_invoice = $salary_invoice;
                $borrower->save();
            }

            // Upload Mortgage
            if ($request['borrower_mortgage'] != null){
                $mortgage = StringHelper::uploadImage($request['borrower_mortgage'], Borrower::mortgagePath, Borrower::thumbnailMortgagePath);
                $borrower->mortgage = $mortgage;
                $borrower->save();
            }

            // Upload Family Book
            if ($request['borrower_family_book'] != null){
                $family_book = StringHelper::uploadImage($request['borrower_family_book'], Borrower::familyBookPath, Borrower::thumbnailFamilyBookPath);
                $borrower->family_book = $family_book;
                $borrower->save();
            }
        }


        //Insert Guarantor
        $borrower_guarantor_data = [
            BorrowerGuarantor::BORROWER_ID => $borrower->id,
            BorrowerGuarantor::FIRST_NAME => $request->input('guarantor_first_name'),
            BorrowerGuarantor::LAST_NAME => $request->input('guarantor_last_name'),
            BorrowerGuarantor::GENDER => $request->input('guarantor_gender'),
            BorrowerGuarantor::DOB => $request->input('guarantor_dob'),
            BorrowerGuarantor::EMAIL => $request->input('guarantor_email'),
            BorrowerGuarantor::PHONE => $request->input('guarantor_phone'),
            BorrowerGuarantor::ALT_PHONE => $request->input('guarantor_alt_phone'),
            BorrowerGuarantor::ADDRESS => $request->input('guarantor_address'),
            BorrowerGuarantor::BUSINESS_NAME => $request->input('guarantor_business_name')
        ];

        $borrower_guarantor = new BorrowerGuarantor();
        $borrower_guarantor->setData($borrower_guarantor_data);
        if($borrower_guarantor->save()){
            // Upload Photo
            if ($request['guarantor_photo'] != null){
                $photo = StringHelper::uploadImage($request['guarantor_photo'], BorrowerGuarantor::photoPath, BorrowerGuarantor::thumbnailPhotoPath);
                $borrower_guarantor->photo = $photo;
                $borrower_guarantor->save();
            }

            // Upload National
            if ($request['guarantor_national_photo'] != null){
                $national_photo = StringHelper::uploadImage($request['guarantor_national_photo'], BorrowerGuarantor::nationalPath, BorrowerGuarantor::thumbnailNationalPath);
                $borrower_guarantor->national_id_photo = $national_photo;
                $borrower_guarantor->save();
            }

            // Upload Salary Invoice
            if ($request['guarantor_salary_invoice'] != null){
                $salary_invoice = StringHelper::uploadImage($request['guarantor_salary_invoice'], BorrowerGuarantor::salaryInvoicePath, BorrowerGuarantor::thumbnailSalaryInvoicePath);
                $borrower_guarantor->salary_invoice = $salary_invoice;
                $borrower_guarantor->save();
            }

            // Upload Mortgage
            if ($request['guarantor_mortgage'] != null){
                $mortgage = StringHelper::uploadImage($request['guarantor_mortgage'], BorrowerGuarantor::mortgagePath, BorrowerGuarantor::thumbnailMortgagePath);
                $borrower_guarantor->mortgage = $mortgage;
                $borrower_guarantor->save();
            }
        }


        //Insert Loan
        $loan_data = [
            Loan::BORROWER_ID => $borrower->id,
            Loan::REQUEST_AMOUNT => $request->input('request_amount'),
            Loan::TERM => $request->input('term'),
            Loan::OUTSTANDING_AMOUNT => $request->input('outstanding_amount'),
        ];

        $loan = new Loan();
        $loan->setData($loan_data);
        $loan->save();

        return $this->responseWithData();

    }
}
