<?php

namespace App\Http\Controllers;

use App\Models\VMM;
use Illuminate\Http\Request;

class VMMController extends Controller
{
    public function index()
    {
        $vmms = VMM::all();
        return view('admin.vmm.index', compact('vmms'));
    }

    public function create()
    {
        return view('admin.vmm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'lifetime' => 'required|integer|min:1',
            'minimum_invest' => 'required|integer|min:1',
            'distribute_coin' => 'required|integer|min:1',
            'execution_time' => 'required|integer|min:1',
            'preparation_time' => 'required|integer|min:1',
            'start_time' => 'required|date',
            'status' => 'required|in:draft,active,in_preparation,running,finished'
        ]);

        VMM::create($request->all());

        return redirect()->route('admin.vmm.index')->with('success', 'VMM created successfully');
    }
}
