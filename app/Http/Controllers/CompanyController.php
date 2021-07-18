<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Http\Requests\CompanyStoreRequest;

class CompanyController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.companies', [
            'companies' => Company::get()
        ]);
    }
    
    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.company.create');
    }

    /**
     * @param CompanyStoreRequest $request
     * @return JsonResponse
     */
    public function store(CompanyStoreRequest $request): JsonResponse
    {
        if ($request->hasLogo()) {
            $request->request->add([
                'logo' => $request->file('company_logo')->store('public/logos')
            ]);
        }

        return response()->json([
            'result' => (Company::create($request->all()) ? 'success' : 'false')
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $company = Company::with('employees')->findOrFail($id);

        return view('admin.company.show', [
            'company' => $company,
            'employees' => $company->employees
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        if (Company::destroy($id)) {
            return response()->json([
                'result' => 'success'
            ]);
        }

        return response()->json([
            'result' => 'fail'
        ]);
    }
}
