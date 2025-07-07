<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // ✅ Show Dashboard
    public function index()
    {
        $json = file_get_contents(public_path('data/main_data.json'));
        $data = json_decode($json, true) ?? [];
        $data = array_values($data); // ✅ Reindex to avoid illegal offset

        return view('Frontend.dashboard', compact('data'));
    }

    // ✅ Create Page
    public function create()
    {
        return view('Frontend.create');
    }

    // ✅ Store New Record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NamaSiMati' => 'required',
            'NoKP' => 'nullable',
            'Kampung' => 'nullable',
            'Umur' => 'nullable|numeric',
            'Jantina' => 'nullable',
            'NamaBapa' => 'nullable',
            'NamaEmak' => 'nullable',
            'TarikhHijrah' => 'nullable',
            'TarikhMasihi' => 'nullable|date',
            'MasaPengebumian' => 'nullable',
            'SebabKematian' => 'nullable',
            'NamaWaris' => 'nullable',
            'NoTelWaris' => 'nullable',
            'HubunganWaris' => 'nullable',
            'NoPlot' => 'nullable',
        ]);

        $jsonPath = public_path('data/main_data.json');
        $data = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];
        $data[] = $validated;

        file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->route('dashboard')->with('success', 'Rekod berjaya ditambah.');
    }

    // ✅ Edit Record
    public function edit($id)
    {
        $json = file_get_contents(public_path('data/main_data.json'));
        $data = json_decode($json, true) ?? [];
        $data = array_values($data); // ✅ Avoid illegal offset error

        return view('Frontend.edit', compact('data', 'id'));
    }

    // ✅ Update Record
    public function update(Request $request, $id)
    {
        $jsonPath = public_path('data/main_data.json');
        $data = json_decode(file_get_contents($jsonPath), true) ?? [];
        $data = array_values($data); // ✅ Reindex

        if (!isset($data[$id])) {
            return redirect()->route('dashboard')->with('error', 'Data tidak dijumpai.');
        }

        $validated = $request->validate([
            'NamaSiMati' => 'required',
            'NoKP' => 'nullable',
            'Kampung' => 'nullable',
            'Umur' => 'nullable|numeric',
            'Jantina' => 'nullable',
            'NamaBapa' => 'nullable',
            'NamaEmak' => 'nullable',
            'TarikhHijrah' => 'nullable',
            'TarikhMasihi' => 'nullable|date',
            'MasaPengebumian' => 'nullable',
            'SebabKematian' => 'nullable',
            'NamaWaris' => 'nullable',
            'NoTelWaris' => 'nullable',
            'HubunganWaris' => 'nullable',
            'NoPlot' => 'nullable',
        ]);

        $data[$id] = $validated;

        file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->route('dashboard')->with('success', 'Data berjaya dikemaskini.');
    }

    // ✅ Delete Record
    public function delete($id)
    {
        $jsonPath = public_path('data/main_data.json');
        $data = json_decode(file_get_contents($jsonPath), true) ?? [];

        $data = array_values($data); // ✅ Reindex to avoid key issues

        if (isset($data[$id])) {
            unset($data[$id]);
            $data = array_values($data); // ✅ Reindex after delete
            file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        return redirect()->route('dashboard')->with('success', 'Rekod berjaya dipadam.');
    }
public function overview()
{
    $json = file_get_contents(public_path('data/main_data.json'));
    $data = json_decode($json, true) ?? [];
    $data = array_values($data); // ✅ Reindex for safe key handling

    // ✅ Gender
    $genderData = array_count_values(array_column($data, 'Jantina'));

    // ✅ Cause of Death
    $causeData = array_count_values(array_column($data, 'SebabKematian'));

    // ✅ Kampung
    $kampungData = array_count_values(array_column($data, 'Kampung'));

    // ✅ Age Group
    $umurGroup = [
        '0-20' => 0,
        '21-40' => 0,
        '41-60' => 0,
        '61+' => 0,
    ];
    foreach ($data as $item) {
        $umur = isset($item['Umur']) ? (int)$item['Umur'] : 0;
        if ($umur <= 20) {
            $umurGroup['0-20']++;
        } elseif ($umur <= 40) {
            $umurGroup['21-40']++;
        } elseif ($umur <= 60) {
            $umurGroup['41-60']++;
        } else {
            $umurGroup['61+']++;
        }
    }

    // ✅ Death by Year (Tarikh Masihi)
    $yearData = [];
    foreach ($data as $item) {
        if (!empty($item['TarikhMasihi'])) {
            $year = date('Y', strtotime($item['TarikhMasihi']));
            if (!isset($yearData[$year])) {
                $yearData[$year] = 0;
            }
            $yearData[$year]++;
        }
    }
    ksort($yearData); // Sort by year

    // ✅ Relationship (Hubungan Waris)
    $hubunganData = array_count_values(array_column($data, 'HubunganWaris'));

    return view('Frontend.overview', compact(
        'genderData',
        'causeData',
        'kampungData',
        'umurGroup',
        'yearData',
        'hubunganData'
    ));
}


}
