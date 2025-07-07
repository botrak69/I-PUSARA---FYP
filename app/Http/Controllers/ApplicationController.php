<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $file = 'permohonan.json';

        // Check if file exists
        if (Storage::exists($file)) {
            $current = json_decode(Storage::get($file), true);
        } else {
            $current = [];
        }

        $current[] = $data;

        Storage::put($file, json_encode($current, JSON_PRETTY_PRINT));

        return redirect()->back()->with('success', 'Permohonan berjaya dihantar!');
    }

    public function index()
    {
        $file = 'permohonan.json';

        if (Storage::exists($file)) {
            $applications = json_decode(Storage::get($file), true);
        } else {
            $applications = [];
        }

        return view('admin.permohonan.index', compact('applications'));
    }
}
