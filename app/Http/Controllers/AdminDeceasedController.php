<?php

namespace App\Http\Controllers;

use App\Models\Deceased;
use Illuminate\Http\Request;

class AdminDeceasedController extends Controller
{
    public function index()
    {
        $deceaseds = Deceased::all();
        return view('admin.index', compact('deceaseds'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'lot_number' => 'required',
            'x_coordinate' => 'required|numeric',
            'y_coordinate' => 'required|numeric',
        ]);

        Deceased::create($request->all());
        return redirect()->route('admin.index')->with('success', 'Record added successfully');
    }

    public function edit($id)
    {
        $deceased = Deceased::findOrFail($id);
        return view('admin.edit', compact('deceased'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'lot_number' => 'required',
            'x_coordinate' => 'required|numeric',
            'y_coordinate' => 'required|numeric',
        ]);

        $deceased = Deceased::findOrFail($id);
        $deceased->update($request->all());

        return redirect()->route('admin.index')->with('success', 'Record updated successfully');
    }

    public function destroy($id)
    {
        $deceased = Deceased::findOrFail($id);
        $deceased->delete();

        return redirect()->route('admin.index')->with('success', 'Record deleted successfully');
    }
}
