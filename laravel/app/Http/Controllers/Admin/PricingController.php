<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Pricing;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Services;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricings = Pricing::oldest('order')->paginate(10);
        return view('admin.pricing.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Services::where('status', 1)->get();
        $servicePricing = Null;
        return view('admin.pricing.create', compact(['services', 'servicePricing']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $pricing =  Pricing::create($input);
        return redirect()->route('pricing.edit', $pricing->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Pricing $pricing)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pricing $pricing)
    {
        $services = Services::where('status', 1)->get();
        $servicePricing = $pricing->services ?? null;
        return view('admin.pricing.edit', compact(['pricing', 'services', 'servicePricing']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Pricing $pricing)
    {
        $input = $request->all();
        $pricing->update($input);
        return redirect()->route('pricing.edit', $pricing->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        return redirect()->route('pricing.index')->with('message', 'Delete Successfully');
    }
}
