<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Mail\CompanyApproveRequest;
use App\Mail\CompanyRejectRequest;
use App\Mail\CustomerPassword;
use App\Mail\NewRequestLoan;
use App\Models\Borrower;
use App\Models\BorrowerGuarantor;
use App\Models\Company;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoanController extends Controller
{
    //request loan
    public function requestLoan(Request $request){

        DB::beginTransaction();

        $six_digit_random_number = mt_rand(100000, 999999);

        //Insert Borrower
        $borrower_data = [
            Borrower::COMPANY_ID => $request->input('company_id'),
            Borrower::FIRST_NAME => $request->input('borrower_first_name'),
            Borrower::LAST_NAME => $request->input('borrower_last_name'),
            Borrower::GENDER => $request->input('borrower_gender'),
            Borrower::DOB => $request->input('borrower_dob'),
            Borrower::EMAIL => $request->input('borrower_email'),
            Borrower::PASSWORD => $six_digit_random_number,
            Borrower::PHONE => $request->input('borrower_phone'),
            Borrower::ALT_PHONE => $request->input('borrower_alt_phone'),
            Borrower::ADDRESS => $request->input('borrower_address'),
            Borrower::BUSINESS_NAME => $request->input('borrower_business_name')
        ];

        $borrower = new Borrower();
        $borrower->setData($borrower_data);
        if($borrower->save()){
            //Send Mail
            Mail::to($request->input('borrower_email'))->send(new CustomerPassword($six_digit_random_number));
            Mail::to(Company::find($request->input('company_id'))->email)->send(new NewRequestLoan($request));

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
            Loan::INTEREST => $request->input('interest'),
            Loan::OUTSTANDING_AMOUNT => $request->input('outstanding_amount'),
        ];

        $loan = new Loan();
        $loan->setData($loan_data);
        $loan->save();

        DB::commit();
        return $this->responseWithData();

    }

    //Borrower Review Login
    public function borrowerReviewLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $borrower = Borrower::where(Borrower::EMAIL, $request->input('email'))
        ->where(Borrower::PASSWORD, $request->input('password'))
        ->first();

        if(!empty($borrower)){
            return $this->responseWithData($borrower);
        }else{
            return response()->json([
                'success' => 0,
                'message' => 'Invalid email and password'
            ], 200);
        }
    }

    //Borrower Review List
    public function borrowerReviewList(Request $request){
        $this->validate($request, [
            'borrower_id' => 'required|exists:borrower,id'
        ]);

        $tableSize = empty($request->input('table_size')) ? 10 : $request->input('table_size');

        $filter = $request->input('filter');
        $search = !empty($filter['search']) ? $filter['search'] : null;

        $data = Loan::join('borrower', 'borrower.id', 'loan.borrower_id')
            ->join('borrower_guarantor', 'borrower_guarantor.borrower_id', 'borrower.id')
            ->join('company', 'company.id', 'borrower.company_id')
            ->where('loan.borrower_id', $request->input('borrower_id'))
            ->when($search, function ($query) use ($search) {
                $query->where('company.company_name', 'LIKE', "%{$search}%")
                ->orWhere('loan.created_at', 'LIKE', "%{$search}%")
                ->orWhere('loan.term', 'LIKE', "%{$search}%")
                ->orWhere('loan.interest', 'LIKE', "%{$search}%")
                ->orWhere('loan.outstanding_amount', 'LIKE', "%{$search}%")
                ->orWhere('loan.appointment_date', 'LIKE', "%{$search}%")
                ->orWhere('loan.status', 'LIKE', "%{$search}%");
            })
            ->select(
                'loan.id as id',
                'company.id as company_id',
                'company.company_name',
                'loan.created_at as request_date',
                'loan.request_amount',
                'loan.term',
                'loan.interest',
                'loan.outstanding_amount',
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
                'borrower_guarantor.id as guarantor_id',
                'borrower_guarantor.first_name as guarantor_first_name',
                'borrower_guarantor.last_name as guarantor_last_name',
                'borrower_guarantor.gender as guarantor_gender',
                'borrower_guarantor.dob as guarantor_dob',
                'borrower_guarantor.business_name as guarantor_business_name',
                'borrower_guarantor.email as guarantor_email',
                'borrower_guarantor.phone as guarantor_phone',
                'borrower_guarantor.alt_phone as guarantor_alt_phone',
                'borrower_guarantor.address as guarantor_address',
                'borrower_guarantor.photo as guarantor_photo',
                'borrower_guarantor.national_id_photo as guarantor_national_photo',
                'borrower_guarantor.salary_invoice as guarantor_salary_invoice',
                'borrower_guarantor.mortgage as guarantor_mortgage',
                'loan.appointment_date',
                'loan.status',
            )
            ->orderBy('loan.id', 'desc')
            ->paginate($tableSize);

        return $this->responseWithPagination($data);
    }

    //Get Request List By Company
    public function getByCompany(Request $request){
        $this->validate($request, [
            'company_id' => 'required|exists:company,id'
        ]);

        $tableSize = empty($request->input('table_size')) ? 10 : $request->input('table_size');

        $filter = $request->input('filter');
        $search = !empty($filter['search']) ? $filter['search'] : null;

        $data = Loan::join('borrower', 'borrower.id', 'loan.borrower_id')
            ->join('borrower_guarantor', 'borrower_guarantor.borrower_id', 'borrower.id')
            ->join('company', 'company.id', 'borrower.company_id')
            ->where('borrower.company_id', $request->input('company_id'))
            ->when($search, function ($query) use ($search) {
                $query->where('company.company_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.first_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.last_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.address', 'LIKE', "%{$search}%")
                ->orWhere('borrower.email', 'LIKE', "%{$search}%")
                ->orWhere('borrower.business_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.first_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.last_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.address', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.email', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.business_name', 'LIKE', "%{$search}%")
                ->orWhere('loan.created_at', 'LIKE', "%{$search}%")
                ->orWhere('loan.term', 'LIKE', "%{$search}%")
                ->orWhere('loan.interest', 'LIKE', "%{$search}%")
                ->orWhere('loan.outstanding_amount', 'LIKE', "%{$search}%")
                ->orWhere('loan.appointment_date', 'LIKE', "%{$search}%")
                ->orWhere('loan.status', 'LIKE', "%{$search}%");
            })
            ->select(
                'loan.id as id',
                'company.id as company_id',
                'company.company_name',
                'loan.created_at as request_date',
                'loan.request_amount',
                'loan.term',
                'loan.interest',
                'loan.outstanding_amount',
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
                'borrower_guarantor.id as guarantor_id',
                'borrower_guarantor.first_name as guarantor_first_name',
                'borrower_guarantor.last_name as guarantor_last_name',
                'borrower_guarantor.gender as guarantor_gender',
                'borrower_guarantor.dob as guarantor_dob',
                'borrower_guarantor.business_name as guarantor_business_name',
                'borrower_guarantor.email as guarantor_email',
                'borrower_guarantor.phone as guarantor_phone',
                'borrower_guarantor.alt_phone as guarantor_alt_phone',
                'borrower_guarantor.address as guarantor_address',
                'borrower_guarantor.photo as guarantor_photo',
                'borrower_guarantor.national_id_photo as guarantor_national_photo',
                'borrower_guarantor.salary_invoice as guarantor_salary_invoice',
                'borrower_guarantor.mortgage as guarantor_mortgage',
                'loan.appointment_date',
                'loan.status',
            )
            ->orderBy('loan.id', 'desc')
            ->paginate($tableSize);

        return $this->responseWithPagination($data);
    }

    //Approve Request
    public function approve(Request $request){
        $this->validate($request, [
            'loan_id' => 'required|exists:loan,id',
            'appointment_date' => 'required',
            'borrower_id' => 'required|exists:borrower,id',
        ]);

        DB::table('loan')
            ->where('id', $request->input('loan_id'))
            ->update([
                'appointment_date' => $request->input('appointment_date'),
                'status' => 'Approved',
                'updated_at' => Carbon::now()
            ]);

        $borrower = Borrower::find($request->input('borrower_id'));

        $data= [
            'last_name' => $borrower->last_name,
            'appointment_date' => $request->input('appointment_date')
        ];

        Mail::to($borrower->email)->send(new CompanyApproveRequest($data));

        return $this->responseWithData();
    }

    //Reject Request
    public function reject(Request $request){
        $this->validate($request, [
            'loan_id' => 'required|exists:loan,id',
            'borrower_id' => 'required|exists:borrower,id',
        ]);

        DB::table('loan')
            ->where('id', $request->input('loan_id'))
            ->update([
                'status' => 'Rejected',
                'updated_at' => Carbon::now()
            ]);

        $borrower = Borrower::find($request->input('borrower_id'));
        Mail::to($borrower->email)->send(new CompanyRejectRequest($borrower));

        return $this->responseWithData();
    }


    //Get Loan All
    public function getAll(Request $request){

        $filter = $request->input('filter');
        $search = !empty($filter['search']) ? $filter['search'] : null;

        $tableSize = empty($request->input('table_size')) ? 10 : $request->input('table_size');

        $data = Loan::join('borrower', 'borrower.id', 'loan.borrower_id')
            ->join('borrower_guarantor', 'borrower_guarantor.borrower_id', 'borrower.id')
            ->join('company', 'company.id', 'borrower.company_id')
            ->when($search, function ($query) use ($search) {
                $query->where('company.company_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.first_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.last_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.address', 'LIKE', "%{$search}%")
                ->orWhere('borrower.email', 'LIKE', "%{$search}%")
                ->orWhere('borrower.business_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.first_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.last_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.address', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.email', 'LIKE', "%{$search}%")
                ->orWhere('borrower_guarantor.business_name', 'LIKE', "%{$search}%")
                ->orWhere('loan.created_at', 'LIKE', "%{$search}%")
                ->orWhere('loan.term', 'LIKE', "%{$search}%")
                ->orWhere('loan.interest', 'LIKE', "%{$search}%")
                ->orWhere('loan.outstanding_amount', 'LIKE', "%{$search}%")
                ->orWhere('loan.appointment_date', 'LIKE', "%{$search}%")
                ->orWhere('loan.status', 'LIKE', "%{$search}%");
            })
            ->select(
                'loan.id as id',
                'company.id as company_id',
                'company.company_name',
                'loan.created_at as request_date',
                'loan.request_amount',
                'loan.term',
                'loan.interest',
                'loan.outstanding_amount',
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
                'borrower_guarantor.id as guarantor_id',
                'borrower_guarantor.first_name as guarantor_first_name',
                'borrower_guarantor.last_name as guarantor_last_name',
                'borrower_guarantor.gender as guarantor_gender',
                'borrower_guarantor.dob as guarantor_dob',
                'borrower_guarantor.business_name as guarantor_business_name',
                'borrower_guarantor.email as guarantor_email',
                'borrower_guarantor.phone as guarantor_phone',
                'borrower_guarantor.alt_phone as guarantor_alt_phone',
                'borrower_guarantor.address as guarantor_address',
                'borrower_guarantor.photo as guarantor_photo',
                'borrower_guarantor.national_id_photo as guarantor_national_photo',
                'borrower_guarantor.salary_invoice as guarantor_salary_invoice',
                'borrower_guarantor.mortgage as guarantor_mortgage',
                'loan.appointment_date',
                'loan.status',
            )
            ->orderBy('loan.id', 'desc')
            ->paginate($tableSize);

        return $this->responseWithPagination($data);
    }
}
