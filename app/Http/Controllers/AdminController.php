<?php

namespace App\Http\Controllers;

use App\Models\Agenda; // Assuming Agenda is your model
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Retrieve all agendas from the database
        $agendas = Agenda::all();

        // Pass the agendas to the view
        return view('admin.dashboard', compact('agendas'));
    }
}
?>