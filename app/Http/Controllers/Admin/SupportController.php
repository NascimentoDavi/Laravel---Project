<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function main (Support $support) {

        // return all the registers.
        $supports = $support->all();

        return view('admin/supports/main', compact('supports'));
    }

    public function create () 
    {
        return view('admin/supports/create');
    }

    public function store (Request $request) 
    {
        dd($request->all());
    }
}
