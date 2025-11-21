<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->get();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_aktivitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'no_hp' => 'required|string|max:15|regex:/^[0-9+\-\s()]+$/',
            'status' => 'required|in:berjalan,selesai',
        ]);

        Activity::create($validated);

        return redirect()->route('activities.index')
            ->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'nama_aktivitas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'no_hp' => 'required|string|max:15|regex:/^[0-9+\-\s()]+$/',
            'status' => 'required|in:berjalan,selesai',
        ]);

        $activity->update($validated);

        return redirect()->route('activities.index')
            ->with('success', 'Aktivitas berhasil diperbarui!');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activities.index')
            ->with('success', 'Aktivitas berhasil dihapus!');
    }
}