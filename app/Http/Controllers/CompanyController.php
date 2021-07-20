<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Http\Requests\CompanyStoreUpdateRequest;
use App\Http\Traits\UploadTrait;

class CompanyController extends Controller
{
    use UploadTrait;

    /**
     * @param CompanyStoreUpdateRequest $request
     * @return CompanyStoreUpdateRequest
     */
    private function uploadCompanyLogo(CompanyStoreUpdateRequest $request): CompanyStoreUpdateRequest
    {
        if ($request->hasLogo()) {
            $request->request->add([
                'logo' => $this->upload($request->file('company_logo'))
            ]);
        }

        return $request;
    }

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
        $request = $this->uploadCompanyLogo($request);

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
        $request = $this->uploadCompanyLogo($request);
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
