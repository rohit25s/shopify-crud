<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Exports\InventoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::latest()->paginate(5);

        return view('inventories.index', compact('inventories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required',
            'quantity' => 'required',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('inventories.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required',
            'quantity' => 'required',
        ]);
        $inventory->update($request->all());

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory deleted successfully');
    }

    public function export(){

        return Excel::download(new InventoryExport, 'inventory.csv');
    }
}
