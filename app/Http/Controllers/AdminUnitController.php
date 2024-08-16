<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Gate;

class AdminUnitController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view units')) {
            abort(403);
        }

        $units = Unit::latest()->get();

        return view('admin.units.index', compact('units'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('create units')) {
            abort(403);
        }

        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unit::Create([
            'name' => $request->name,
        ]);
        
        return redirect()->route('units.index')->with('success','Unit Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Gate::allows('edit units')) {
            abort(403);
        }

        $unit = Unit::find($id);
        return view('admin.units.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = Unit::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('units.index')->with('success','Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('delete units')) {
            abort(403);
        }

        $unit = Unit::where('id', $id)->first();

        if ($unit) {
            if($unit->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }

            $unit->update([
                'status' => $status
            ]);

            return response()->json(['status' => 'success', 'unit' => $status, 'message' => 'Unit deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Unit not found.'], 404);
        }
    }
}
