<?php

namespace App\Http\Controllers;

use App\Models\Criterion;
use Illuminate\Http\Request;

class CriterionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criteria = Criterion::all();
        return view('admin.master-data', compact('criteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:criteria,name',
            'weight' => 'required|numeric|min:0',
        ]);

        Criterion::create($validated);

        return redirect()->back()
            ->with('success', 'Kriteria berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criterion $criterion)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:criteria,name,'.$criterion->id,
            'weight' => 'required|numeric|min:0',
        ]);

        $criterion->update($validated);

        return redirect()->back()
            ->with('success', 'Kriteria berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criterion $criterion)
    {
        // Cek apakah kriteria sudah digunakan di nilai siswa
        if ($criterion->scores()->exists()) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus kriteria karena sudah digunakan');
        }

        $criterion->delete();

        return redirect()->back()
            ->with('success', 'Kriteria berhasil dihapus');
    }
}