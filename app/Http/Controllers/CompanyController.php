<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Company;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
