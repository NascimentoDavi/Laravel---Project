<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;
use Illuminate\Http\Request;
use App\DTOs\Supports\{ CreateSupportDTO, UpdateSupportDTO };
use App\Http\Resources\SupportResource;
use Illuminate\Http\Response;

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
        if(!$support = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }
        return new SupportResource($support);
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
        if(!$this->service->findOne($id)) { // Não precisa armazenar | Primeiro procura pelo registro para verificar se existe
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }
        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT); // 204
    }
}
