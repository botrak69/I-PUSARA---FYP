<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $mainFile = 'data/main_data.json';
    private $permohonanFile = 'app/permohonan.json';

    // List all existing data
    public function index()
    {
        $data = $this->readJson($this->mainFile);
        return view('Frontend.dashboard', compact('data'));
    }

    // Approval list
    public function approval()
    {
        $data = $this->readJson($this->permohonanFile);
        return view('Frontend.approval', compact('data'));
    }

    // Accept approval
    public function accept($id)
    {
        $pending = $this->readJson($this->permohonanFile);
        $main = $this->readJson($this->mainFile);

        if (isset($pending[$id])) {
            $main[] = $pending[$id];
            unset($pending[$id]);

            $this->writeJson($this->mainFile, array_values($main));
            $this->writeJson($this->permohonanFile, array_values($pending));
        }

        return back()->with('success', 'Permohonan berjaya diterima.');
    }

    // Reject approval
    public function reject($id)
    {
        $pending = $this->readJson($this->permohonanFile);

        if (isset($pending[$id])) {
            unset($pending[$id]);
            $this->writeJson($this->permohonanFile, array_values($pending));
        }

        return back()->with('success', 'Permohonan telah ditolak.');
    }

    // Create
    public function create()
    {
        return view('Frontend.create');
    }

    // Store new
    public function store(Request $request)
    {
        $data = $this->readJson($this->mainFile);

        $data[] = $request->except('_token');
        $this->writeJson($this->mainFile, $data);

        return redirect()->route('dashboard')->with('success', 'Data berjaya ditambah.');
    }

    // Edit
    public function edit($id)
    {
        $data = $this->readJson($this->mainFile);
        return view('Frontend.edit', compact('data', 'id'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $data = $this->readJson($this->mainFile);

        $data[$id] = $request->except('_token');
        $this->writeJson($this->mainFile, $data);

        return redirect()->route('dashboard')->with('success', 'Data berjaya dikemaskini.');
    }

    // Delete
    public function delete($id)
    {
        $data = $this->readJson($this->mainFile);

        unset($data[$id]);
        $this->writeJson($this->mainFile, array_values($data));

        return back()->with('success', 'Data berjaya dipadam.');
    }

    // Read JSON helper
    private function readJson($path)
    {
        $fullPath = public_path($path);
        if (!file_exists($fullPath)) {
            file_put_contents($fullPath, json_encode([]));
        }

        return json_decode(file_get_contents($fullPath), true) ?? [];
    }

    // Write JSON helper
    private function writeJson($path, $data)
    {
        $fullPath = public_path($path);
        file_put_contents($fullPath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
