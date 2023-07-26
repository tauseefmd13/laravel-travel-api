<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResource;
use App\Models\Travel;

/**
 * @group Admin Endpoints
 *
 * @subgroup Travel management
 */
class TravelController extends Controller
{
    /**
     * @apiResource App\Http\Resources\TravelResource
     *
     * @apiResourceModel App\Models\Travel
     *
     * @authenticated
     */
    public function store(TravelRequest $request)
    {
        $travel = Travel::create($request->validated());

        return new TravelResource($travel);
    }

    /**
     * @apiResource App\Http\Resources\TravelResource
     *
     * @apiResourceModel App\Models\Travel
     *
     * @authenticated
     */
    public function update(TravelRequest $request, Travel $travel)
    {
        $travel->update($request->validated());

        return new TravelResource($travel);
    }
}
