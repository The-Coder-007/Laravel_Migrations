<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller {
    public function dashboard() {
        $employees = User::with('parties.orders')->where('role', 'employee')->get();
        return view('admin.dashboard', compact('employees'));
    }
}
