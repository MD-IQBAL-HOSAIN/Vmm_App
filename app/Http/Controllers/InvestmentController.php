<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\VMM;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function store(Request $request, VMM $vmm)
    {
        $request->validate([
            'amount' => 'required|integer|min:' . $vmm->minimum_invest
        ]);

        Investment::create([
            'user_id' => auth()->id(),
            'vmm_id' => $vmm->id,
            'amount' => $request->amount
        ]);

        return back()->with('success', 'Investment successful');
    }
}