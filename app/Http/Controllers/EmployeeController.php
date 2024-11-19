<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller {
    public function dashboard() {
        $parties = Auth::user()->parties()->with('orders')->get();
        return view('employee.dashboard', compact('parties'));
    }

    public function addParty(Request $request) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        Party::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'employee_id' => Auth::id(),
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Party added successfully!');
    }

    public function addOrder(Request $request, Party $party) {
        $request->validate([
            'order_date' => 'required|date',
        ]);

        $party->orders()->create(['order_date' => $request->order_date]);

        return redirect()->route('employee.dashboard')->with('success', 'Order added successfully!');
    }
}
