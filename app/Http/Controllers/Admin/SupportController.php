<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Services\SupportService;
use App\DTOs\CreateSupportDTO;
use App\DTOs\UpdateSupportDTO;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service)
    {
    }

    // Get All
    public function main (Request $request) {
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/main', compact('supports'));
    }

    public function show (string | int $id)
    {
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

    public function store (StoreUpdateSupport $request)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('support.main');
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
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request) // "::" are used to access static methods from the class
        );
        
        if (!$support)
        {
            return redirect()->back();
        }
        return redirect()->route('support.main');
    }       
    
    public function destroy (string | int $id)
    {
        $this->service->delete($id);
        return redirect()->route('support.main');
    }
}
