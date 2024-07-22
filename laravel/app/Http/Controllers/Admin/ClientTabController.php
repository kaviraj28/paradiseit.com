<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\ClientTab;
use Illuminate\Http\Request;

class ClientTabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientTabs = ClientTab::oldest('name')->paginate(20);
        return view('admin.clientTab.index', compact('clientTabs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clientTab.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $clientTab =  ClientTab::create($input);
        return redirect()->route('clientTab.edit', $clientTab->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(ClientTab $clientTab)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientTab $clientTab)
    {
        return view('admin.clientTab.edit', compact('clientTab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, ClientTab $clientTab)
    {
        $input = $request->all();
        $clientTab->update($input);
        return redirect()->route('clientTab.edit', $clientTab->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientTab $clientTab)
    {
        $clientTab->delete();
        return redirect()->route('clientTab.index')->with('message', 'Delete Successfully');
    }
}
