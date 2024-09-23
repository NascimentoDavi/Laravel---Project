<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Services\SupportService;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service)
    {
        
    }


    public function main (Request $request) {

        // return all the registers.
        $supports = $this->service->getAll($request->filter);

        return view('admin/supports/main', compact('supports'));
    }






    public function show (string | int $id)
    {
        // Support::where('id', $id)->first();
        // Support::where('id', '=', $id)->first();
        if(!$support = $this->service->findOne($id)) // If no record is found, the support variable will be equal to false.
        {
            return redirect()->back();
        }

        return view('admin/supports/show',  compact('support'));
    }






    public function create () 
    {
        return view('admin/supports/create');
    }






    
    public function store (StoreUpdateSupport $request, Support $support) 
    {
        // Store information inside the database    
        $data = $request->validated();
        $data['status'] = 'o';

        $support = $support->create($data);
        dd($support);
    }







    public function edit (Support $support, string | int $id)
    {
        if(!$support = $this->service->findOne($id))
        {
            return redirect()->back();
        }
        
        return view('admin/supports/edit', compact('support'));
    }






    public function update (StoreUpdateSupport $request, string | int $id)
    {
        if(!$support = Support::where('id', '=', $id)->first())
        {
            return redirect()->back();
        }
        
        $support->update($request->validated());

        // redirect to list
        return redirect()->route('support.main');
    }






    public function destroy (string | int $id)
    {
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }






}
