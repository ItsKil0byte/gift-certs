<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Http\Resources\DesignResource;
use App\Http\Resources\NominalResource;
use App\Models\Design;
use App\Models\Nominal;
use App\Services\CertificateService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicController extends Controller
{
    public function getNominals(): AnonymousResourceCollection
    {
        $nominals = Nominal::whereIsActive(true)->get();

        return NominalResource::collection($nominals);

    }

    public function getDesigns(): AnonymousResourceCollection
    {
        $designs = Design::whereIsActive(true)->get();

        return DesignResource::collection($designs);
    }

    public function store(StoreCertificateRequest $request, CertificateService $certificateService): CertificateResource
    {
        $validated = $request->validated();
        $certificate = $certificateService->create($validated);

        return new CertificateResource($certificate);
    }
}
