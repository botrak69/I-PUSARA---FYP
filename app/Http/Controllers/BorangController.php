<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorangController extends Controller
{
    private $mainFile = 'data/main_data.json';
    private $permohonanFile = 'data/permohonan.json';

    // ✅ Dashboard
    public function dashboard()
    {
        $data = $this->readJson($this->mainFile);
        return view('Frontend.dashboard', compact('data'));
    }

    public function create()
    {
        return view('Frontend.create');
    }

    public function store(Request $request)
    {
        $data = $this->readJson($this->mainFile);

        $data[] = $this->formatData($request);

        $this->writeJson($this->mainFile, $data);

        return redirect()->route('dashboard')->with('success', 'Data berjaya ditambah');
    }

    public function edit($id)
    {
        $data = $this->readJson($this->mainFile);
        return view('Frontend.edit', compact('data', 'id'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->readJson($this->mainFile);

        $data[$id] = $this->formatData($request);

        $this->writeJson($this->mainFile, $data);

        return redirect()->route('dashboard')->with('success', 'Data berjaya dikemaskini');
    }

    public function delete($id)
    {
        $data = $this->readJson($this->mainFile);
        unset($data[$id]);
        $this->writeJson($this->mainFile, array_values($data));

        return redirect()->route('dashboard')->with('success', 'Data berjaya dipadam');
    }

    // ✅ 🆕 Submit Borang Permohonan
    public function submit(Request $request)
    {
        $data = $this->readJson($this->permohonanFile);

        $data[] = $this->formatData($request);

        $this->writeJson($this->permohonanFile, $data);

        return redirect()->route('borang')->with('success', 'Permohonan berjaya dihantar');
    }

    // ✅ Helper to format input data
    private function formatData($request)
    {
        return [
            'NamaSiMati' => $request->namaSiMati ?? $request->nama,
            'NoKP' => $request->nokpSiMati ?? $request->nokp,
            'Kampung' => $request->kampung,
            'Umur' => $request->umurSiMati ?? $request->umur,
            'Jantina' => $request->jantina,
            'NamaBapa' => $request->namaBapa ?? $request->nama_bapa,
            'NamaEmak' => $request->namaEmak ?? $request->nama_emak,
            'TarikhHijrah' => $request->tarikhHijrah ?? $request->tarikh_hijrah,
            'TarikhMasihi' => $request->tarikhMasihi ?? $request->tarikh_masihi,
            'MasaPengebumian' => $request->masaPengebumian ?? $request->masa,
            'SebabKematian' => $request->sebabKematian ?? $request->sebab,
            'NamaWaris' => $request->namaWaris ?? $request->nama_waris,
            'NoTelWaris' => $request->noTelWaris ?? $request->tel_waris,
            'HubunganWaris' => $request->hubunganWaris ?? $request->hubungan,
            'NoPlot' => $request->noPlot ?? $request->no_plot,
        ];
    }

    // ✅ JSON Reader
    private function readJson($file)
    {
        $path = public_path($file);
        if (!file_exists($path)) {
            file_put_contents($path, json_encode([]));
        }
        return json_decode(file_get_contents($path), true) ?? [];
    }

    // ✅ JSON Writer
    private function writeJson($file, $data)
    {
        file_put_contents(public_path($file), json_encode($data, JSON_PRETTY_PRINT));
    }
   
   // Approval  Accept and Reject
    public function approval()
{
    $data = $this->readJson('data/permohonan.json');
    return view('Frontend.approval', compact('data'));
}
public function accept($id)
{
    $permohonan = $this->readJson('data/permohonan.json');
    $main = $this->readJson('data/main_data.json');

    if (isset($permohonan[$id])) {
        $main[] = $permohonan[$id];
        unset($permohonan[$id]);

        // Save
        $this->writeJson('data/main_data.json', array_values($main));
        $this->writeJson('data/permohonan.json', array_values($permohonan));
    }

    return redirect()->route('approval')->with('success', 'Permohonan telah diterima dan dimasukkan ke Dashboard');
}
public function reject($id)
{
    $permohonan = $this->readJson('data/permohonan.json');

    if (isset($permohonan[$id])) {
        unset($permohonan[$id]);
        $this->writeJson('data/permohonan.json', array_values($permohonan));
    }

    return redirect()->route('approval')->with('success', 'Permohonan telah ditolak');
}

}
