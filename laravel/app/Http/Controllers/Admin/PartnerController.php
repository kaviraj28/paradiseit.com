<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Partner;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\ClientCategory;
use App\Models\ClientTab;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::oldest('name')->paginate(20);
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = ClientTab::whereStatus(1)->get();
        $categoryClients = [];
        return view('admin.partners.create', compact(['categorys', 'categoryClients']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request)
    {
        $input = $request->all();
        $blog =  Partner::create($input);
        $blog->clientcategory()->attach($request->category);
        return redirect()->route('partner.edit', $blog->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    // public function show(Partner $partner)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $categorys = ClientTab::whereStatus(1)->get();
        $categoryClients = ClientCategory::where('partner_id', $partner->id)->pluck('clienttab_id')->toArray();
        return view('admin.partners.edit', compact(['partner', 'categorys', 'categoryClients']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $input = $request->all();

        $partner->update($input);

        $partner->clientcategory()->detach();
        $partner->clientcategory()->attach($request->category);
        return redirect()->route('partner.edit', $partner->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->clientcategory()->detach();
        $partner->delete();
        return redirect()->route('partner.index')->with('message', 'Delete Successfully');
    }
}
