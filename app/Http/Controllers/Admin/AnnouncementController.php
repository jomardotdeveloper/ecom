<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.announcements.index', [
            'announcements' => Announcement::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->all();

        $values['image'] = $this->uploadImage($request, 'image', 'announcements');

        Announcement::create($values);

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('backend.announcements.show', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('backend.announcements.edit', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $values = $request->all();
        if($request->hasFile('image'))
            $values['image'] = $this->uploadImage($request, 'image', 'announcements');

        $announcement->update($values);

        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return response()->json(["success" => "Announcement Record Deleted Successfully"],201);
    }
}
