<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Http\Requests\CompanyStoreUpdateRequest;

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
     * @param CompanyStoreUpdateRequest $request
     * @return JsonResponse
     */
    public function store(CompanyStoreUpdateRequest $request): JsonResponse
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
     * @param CompanyStoreUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CompanyStoreUpdateRequest $request, int $id): JsonResponse
    {
        $update = (Company::findOrFail($id)->update($request->all()));

        return response()->json([
            'result' => ($update ? 'success' : 'fail')
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json([
            'result' => (Company::destroy($id) ? 'success' : 'fail')
        ]);
    }
}
