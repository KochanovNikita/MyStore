<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        $company->update($data);
        return redirect()->route('admin.company.index');
    }
}
