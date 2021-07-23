<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //get
    public function get(Request $request)
    {
        $table_size = $request->input('table_size');
        if (empty($table_size)) {
            $table_size = 10;
        }

        $data = Company::paginate($table_size);

        return $this->responseWithPagination($data);
    }

    //store
    public function store(Request $request)
    {
        $this->checkValidation($request);
        DB::beginTransaction();

        $company  = new Company();
        $company->setData($request);
        if ($company->save()) {
            // Upload Logo
            if ($request['logo'] != null){
                $logo = StringHelper::uploadImage($request['logo'], Company::logoPath, Company::thumbnailLogoPath);
                $company->logo = $logo;
                $company->save();
            }

            // Upload interest
            if ($request['interest'] != null){
                $interest = StringHelper::uploadImage($request['interest'], Company::interestPath, Company::thumbnailInterestPath);
                $company->interest = $interest;
                $company->save();
            }
        }

        DB::commit();
        return $this->responseWithData($company);

    }

    //edit
    public function edit(Request $request)
    {
        DB::beginTransaction();
        $this->checkValidation($request);

        $company  = Company::find($request->id);
        $company->setData($request);

        if ($company->save()) {
            //Update Logo
            $logo = StringHelper::editImage($request['logo'], $request['old_logo'], Company::logoPath, Company::thumbnailLogoPath);
            $company->logo = $logo;
            $company->save();

            //Update Interest
            $interest = StringHelper::editImage($request['interest'], $request['old_interest'], Company::interestPath, Company::thumbnailInterestPath);
            $company->interest = $interest;
            $company->save();
        }

        DB::commit();
        return $this->responseWithData($company);
    }

    //delete
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $company  = Company::find($request->id);

        if ($company->delete()) {
            //Delete Logo
            StringHelper::deleteImage($company->logo, Company::logoPath, Company::thumbnailLogoPath);

            //Delete interest
            StringHelper::deleteImage($company->interest, Company::interestPath, Company::interestPath, Company::thumbnailInterestPath);
        }

        DB::commit();
        return $this->responseWithData($company);
    }

    //Check Validation From Front
    public function checkValidation($data)
    {
        $this->validate($data, [
            'company_name' => 'required|max:100',
            'phone_number' => 'required|max:50',
            'alt_phone' => 'required|max:50',
            'logo' => 'required|max:100',
            'email' => 'required|max:100',
            'address' => 'required|max:200',
            'interest' => 'required|max:10',
        ]);
    }
}
