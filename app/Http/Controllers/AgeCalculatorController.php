<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AgeCalculatorController extends Controller
{
    public function showForm()
    {
        return view('age.form');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'birthdate' => 'required|date',
        ]);

        $birthdate = Carbon::parse($request->birthdate);
        $today = Carbon::now();

        $ageYears = $today->diffInYears($birthdate);
        $ageMonths = $today->diffInMonths($birthdate) % 12;
        $ageDays = $today->diffInDays($birthdate->copy()->addYears($ageYears)->addMonths($ageMonths));

        return view('age.result', [
            'birthdate' => $birthdate->format('d M Y'),
            'ageYears' => $ageYears,
            'ageMonths' => $ageMonths,
            'ageDays' => $ageDays,
        ]);
    }
}
