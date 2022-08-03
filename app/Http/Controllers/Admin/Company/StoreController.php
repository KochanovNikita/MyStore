<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        Company::firstOrCreate($data);
        return redirect()->route('admin.company.index');
    }
}
