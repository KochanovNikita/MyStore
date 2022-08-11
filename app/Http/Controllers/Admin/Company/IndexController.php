<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Filters\CompanyFilter;
use App\Http\Requests\Admin\Filter\CompanyFilterRequest;
use App\Models\Company;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CompanyFilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(CompanyFilter::class, ['queryParams' => array_filter($data)]);
        $companies = Company::filter($filter)->paginate(15)->withQueryString();
        return view('admin.company.index', compact('companies'));
    }
}
