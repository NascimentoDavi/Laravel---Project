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

    public function show (string | int $id)
    {

        if(!$support = Support::find($id)) // If no record is found, the support variable will be equal to false.
        {
            return redirect()->back();
        }
        dd($support->subject);
    }

    public function create () 
    {
        return view('admin/supports/create');
    }

    public function store (Request $request, Support $support) 
    {
        // Store information inside the database    
        $data = $request->all();
        $data['status'] = 'o';

        $support = $support->create($data);
        dd($support);
    }
}
