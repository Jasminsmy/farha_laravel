<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;

class BusinessUnitController extends Controller
{
    public function index()
    {
        $businessUnits = BusinessUnit::all();
        return view('business_units.index', compact('businessUnits'));
    }

    public function create()
    {
        return view('business_units.create');
    }

    public function store(Request $request)
    {
        $businessUnit = BusinessUnit::create($request->all());
        return redirect()->route('business_units.index');
    }

    public function show(BusinessUnit $businessUnit)
    {
        return view('business_units.show', compact('businessUnit'));
    }

    public function edit(BusinessUnit $businessUnit)
    {
        return view('business_units.edit', compact('businessUnit'));
    }

    public function update(Request $request, BusinessUnit $businessUnit)
    {
        $businessUnit->update($request->all());
        return redirect()->route('business_units.index');
    }

    public function destroy(BusinessUnit $businessUnit)
    {
        $businessUnit->delete();
        return redirect()->route('business_units.index');
    }
}
