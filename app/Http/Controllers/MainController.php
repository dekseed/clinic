<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TitleName;
use App\Models\Status_patient;

class MainController extends Controller
{
    public function register()
    {
        $title_name = TitleName::all();
        $status_patient = Status_patient::all();

        return view('pages.patient.register', compact('title_name', 'status_patient'));
    }
}
