<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominal;
use App\Models\Design;
use App\Http\Resources\NominalResource;
use App\Http\Resources\DesignResource;
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
}
