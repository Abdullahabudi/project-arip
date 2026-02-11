<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'motor'])->latest()->paginate(10);
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all();
        $motors = \App\Models\Motor::where('status', 'available')->get();
        return view('peminjaman.create', compact('users', 'motors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'motor_id' => 'required|exists:motors,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'notes' => 'nullable|string',
        ]);

        $input = $request->all();
        $input['status'] = 'active';

        Peminjaman::create($input);

        // Update Motor Status
        $motor = \App\Models\Motor::find($request->motor_id);
        $motor->status = 'borrowed';
        $motor->save();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $users = \App\Models\User::all();
        $motors = \App\Models\Motor::all(); // Show all motors in edit, in case we want to change it
        return view('peminjaman.edit', compact('peminjaman', 'users', 'motors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'motor_id' => 'required|exists:motors,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,returned',
            'notes' => 'nullable|string',
        ]);

        $input = $request->all();

        // Handle Status Change
        if ($peminjaman->status == 'active' && $input['status'] == 'returned') {
            $motor = \App\Models\Motor::find($peminjaman->motor_id);
            $motor->status = 'available';
            $motor->save();
        } elseif ($peminjaman->status == 'returned' && $input['status'] == 'active') {
            $motor = \App\Models\Motor::find($input['motor_id']); // Use new motor_id if changed
            $motor->status = 'borrowed';
            $motor->save();
        }

        $peminjaman->update($input);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status == 'active') {
            $motor = \App\Models\Motor::find($peminjaman->motor_id);
            $motor->status = 'available'; // Reset status if we delete an active loan
            $motor->save();
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman deleted successfully');
    }
}
