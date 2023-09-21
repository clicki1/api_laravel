<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyResourceRating;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return CompanyResource::collection($companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function popular(Company $company)
    {
        return CompanyResourceRating::make($company);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function top()
    {
        $companies = Company::all();
        foreach ($companies as $company) {
            $arr_companies[$company->id] = $company->rating_company;
        }
        arsort($arr_companies);
        $companies_sort = [];
        $limit = 0;
        foreach ($arr_companies as $c => $rating){
            if($limit === 10) break;
            $companies_sort[] = CompanyResourceRating::make(Company::find($c));
            $limit++;
        }

        return $companies_sort;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();
        $logo = $data['logo'];
        $logo_name = $logo->hashName();
        $filePath = Storage::disk('public')->putFileAs('/logos', $logo, $logo_name);
        $data['logo'] = $filePath;

        $company = Company::create($data);

        return CompanyResource::make($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return CompanyResource::make($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();
        $logo = $data['logo'];
        $logo_name = $logo->hashName();
        $filePath = Storage::disk('public')->putFileAs('/logos', $logo, $logo_name);
        $data['logo'] = $filePath;

        $company->update($data);

        return CompanyResource::make($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }
}
