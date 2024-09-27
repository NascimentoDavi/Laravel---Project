<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;
use Illuminate\Http\Request;
use App\DTOs\Supports\{ CreateSupportDTO, UpdateSupportDTO };
use App\Http\Resources\SupportResource;

class SupportAPIController extends Controller
{
    public function __construct(
        protected SupportService $service,
    ) { }

    public function index()
    {
    }

    public function store(StoreUpdateSupport $request)
    {
        $support = $this->service->new(CreateSupportDTO::makeFromRequest($request));
        return new SupportResource($support);
    }

    public function show(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
