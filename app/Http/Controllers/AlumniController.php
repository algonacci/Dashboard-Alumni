<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();
        return view('dashboard.alumni.index', compact('alumnis'));
    }

    public function create()
    {
        return view('dashboard.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'foto_alumni' => 'nullable|image|max:2048',
            'tahun_kelulusan' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'kelahiran' => 'required|date',
            'link_instagram' => 'nullable|string|max:255',
        ]);

        $alumniData = $request->only([
            'nama_alumni',
            'tahun_kelulusan',
            'kelas',
            'kelahiran',
            'link_instagram',
        ]);

        if ($request->hasFile('foto_alumni')) {
            $fotoPath = $request->file('foto_alumni')->store('alumni_photos', 'public');
            $alumniData['foto_alumni'] = $fotoPath;
        }

        Alumni::create($alumniData);

        return redirect()->route('alumni.index')->with('success', 'Alumni data has been created successfully.');
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('dashboard.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'foto_alumni' => 'nullable|image|max:2048',
            'tahun_kelulusan' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'kelahiran' => 'required|date',
            'link_instagram' => 'nullable|string|max:255',
        ]);

        $alumniData = $request->only([
            'nama_alumni',
            'tahun_kelulusan',
            'kelas',
            'kelahiran',
            'link_instagram',
        ]);

        if ($request->hasFile('foto_alumni')) {
            $fotoPath = $request->file('foto_alumni')->store('alumni_photos', 'public');
            $alumniData['foto_alumni'] = $fotoPath;
        }

        $alumni->update($alumniData);

        return redirect()->route('alumni.index')->with('success', 'Alumni data has been updated successfully.');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);

        // Delete the associated photo if it exists
        if ($alumni->foto_alumni) {
            Storage::disk('public')->delete($alumni->foto_alumni);
        }

        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Alumni data has been deleted successfully.');
    }

}
