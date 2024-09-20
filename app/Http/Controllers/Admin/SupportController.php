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
        // Support::where('id', $id)->first();
        // Support::where('id', '=', $id)->first();
        if(!$support = Support::find($id)) // If no record is found, the support variable will be equal to false.
        {
            return redirect()->back();
        }

        return view('admin/supports/show',  compact('support'));
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

    public function edit (Support $support, string | int $id)
    {
        if(!$support = Support::where('id', '=', $id)->first())
        {
            return redirect()->back(); // I could return back();
        }
        return view('admin/supports/edit', compact('support'));
    }

    public function update (Support $support, Request $request, string | int $id)
    {
        if(!$support = Support::where('id', '=', $id)->first())
        {
            return redirect()->back();
        }

        /*

        $support->update() could be done manually like this
        This works for registering and editing a register.

        $support->subject = $request->subject;
        $support->body = $request->body;
        $support->save();
        */

        // Make Update with specific value
        $support->update($request->only([
            'subject',
            'body',
        ]));

        // redirect to list
        return redirect()->route('support.main');
    }
}
