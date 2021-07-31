<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\CompanyStoreUpdateRequest;
use App\Http\Traits\UploadTrait;
use App\Http\Resources\SweetAlertResource;
use App\Models\Company;

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
     * @return SweetAlertResource
     */
    public function store(CompanyStoreUpdateRequest $request): SweetAlertResource
    {
        $company = $this->uploadCompanyLogo($request)->all();

        if (Company::create($company)) {
            return new SweetAlertResource([
                'title' => 'Company created!',
                'text' => 'Company was created successfully.',
                'icon' => 'success'
            ]);
        }

        return new SweetAlertResource([
            'title' => 'Failed to register company!',
            'text' => 'It was not possible to register the company.',
            'icon' => 'error'
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
     * @return SweetAlertResource
     */
    public function update(CompanyStoreUpdateRequest $request, int $id): SweetAlertResource
    {
        $company = Company::findOrFail($id);
        $updates = $this->uploadCompanyLogo($request)->all();

        if ($company->update($updates)) {
            return new SweetAlertResource([
                'title' => 'Company updated!',
                'text' => 'Company was updated successfully.',
                'icon' => 'success'
            ]);
        }

        return new SweetAlertResource([
            'title' => 'Failed when trying to update company!',
            'text' => 'It was not possible to update this company.',
            'icon' => 'error'
        ]);
    }

    /**
     * @param int $id
     * @return SweetAlertResource
     */
    public function destroy(int $id): SweetAlertResource
    {
        if (Company::destroy($id)) {
            return new SweetAlertResource([
                'title' => 'Company deleted!',
                'text' => 'Company was deleted successfully.',
                'icon' => 'success'
            ]);
        }

        return new SweetAlertResource([
            'title' => 'Failed when trying to delete company!',
            'text' => 'It was not possible to delete this company.',
            'icon' => 'error'
        ]);
    }
}
