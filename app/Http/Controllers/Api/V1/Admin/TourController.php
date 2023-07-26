<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Http\Resources\TourResource;
use App\Models\Travel;

/**
 * @group Admin Endpoints
 *
 * @subgroup Tour management
 */
class TourController extends Controller
{
    /**
     * @apiResource App\Http\Resources\TourResource
     *
     * @apiResourceModel App\Models\Tour
     *
     * @authenticated
     */
    public function store(TourRequest $request, Travel $travel)
    {
        $tour = $travel->tours()->create($request->validated());

        return new TourResource($tour);
    }
}
