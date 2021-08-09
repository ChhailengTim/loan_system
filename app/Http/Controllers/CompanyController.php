<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\Company;
use App\Models\CompanyInterest;
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

        $filter = $request->input('filter');
        $search = !empty($filter['search']) ? $filter['search'] : null;

        $data = Company::with(['companyInterest'])
            ->when($search, function ($query) use ($search) {
                $query->where('company.company_name', 'LIKE', "%{$search}%")
                ->orWhere('company.phone', 'LIKE', "%{$search}%")
                ->orWhere('company.alt_phone', 'LIKE', "%{$search}%")
                ->orWhere('company.email', 'LIKE', "%{$search}%")
                ->orWhere('company.address', 'LIKE', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate($table_size);

        return $this->responseWithPagination($data);
    }

    //store
    public function store(Request $request)
    {
        $this->checkValidation($request);

        $company  = new Company();
        $company->setData($request);
        if ($company->save()) {
            // Upload Logo
            if ($request['logo'] != null){
                $logo = StringHelper::uploadImage($request['logo'], Company::logoPath, Company::thumbnailLogoPath);
                $company->logo = $logo;
                $company->save();
            }
        }

        foreach($request['company_interest'] as $item){
            $company_interest_data = [
                CompanyInterest::COMPANY_ID => $company->id,
                CompanyInterest::MONTH => $item['month'],
                CompanyInterest::INTEREST => $item['interest']
            ];

            $company_interest  = new CompanyInterest();
            $company_interest->setData($company_interest_data);
            $company_interest->save();
        }

        return $this->responseWithData($company);

    }

    //edit
    public function edit(Request $request)
    {
        $this->checkValidation($request);

        $company  = Company::find($request->id);
        $company->setData($request);

        if ($company->save()) {
            //Update Logo
            $logo = StringHelper::editImage($request['logo'], $request['old_logo'], Company::logoPath, Company::thumbnailLogoPath);
            $company->logo = $logo;
            $company->save();
        }

        $company_interest = CompanyInterest::where(CompanyInterest::COMPANY_ID, $request->id);
        if($company_interest->delete()){
            foreach($request['company_interest'] as $item){
                $company_interest_data = [
                    CompanyInterest::COMPANY_ID => $company->id,
                    CompanyInterest::MONTH => $item['month'],
                    CompanyInterest::INTEREST => $item['interest']
                ];

                $company_interest  = new CompanyInterest();
                $company_interest->setData($company_interest_data);
                $company_interest->save();
            }
        }

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

            //Delete Company Interest
            CompanyInterest::where(CompanyInterest::COMPANY_ID, $request->id)->delete();
        }

        DB::commit();
        return $this->responseWithData($company);
    }

    //Check Validation From Front
    public function checkValidation($data)
    {
        $this->validate($data, [
            'company_name' => 'required|max:100',
            'phone' => 'required|max:50',
            'alt_phone' => 'required|max:50',
            'logo' => 'required',
            'email' => 'required|max:100',
            'address' => 'required|max:200',
        ]);
    }

    //get all
    public function getAll(Request $request)
    {
        $data = Company::with([
            'companyInterest' => function($query){
                $query->orderBy('id', 'asc');
            }
            ])
            ->orderBy('id', 'desc')
            ->get();

        return $this->responseWithData($data);
    }
}
