<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClubRequest;
use App\Http\Resources\ClubCollection;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Filters\ClubFilter;
use App\Http\Resources\ClubResource;
use App\Http\Requests\StoreClubRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class ClubController
 * @package App\Http\Controllers
 *
 * Controller for managing clubs within the application.
 */
class ClubController extends Controller
{
    /**
     * Display a paginated list of clubs with optional agenda inclusion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\ClubCollection
     */
    public function index(Request $request)
    {
        try {
            // Initialize ClubFilter and apply filters to the query
            $filter = new ClubFilter();
            $queryItems = $filter->transform($request);

            // Build the query based on filters
            $clubs = Club::where($queryItems);

            // Include agenda if requested
            $includeAgenda = $request->query('includeAgenda');
            if ($includeAgenda) {
                $clubs = $clubs->with('agendaClubs');
            }

            // Return paginated ClubCollection
            return new ClubCollection($clubs->paginate()->appends($request->query()));
        } catch (\Exception $e) {
            // Log and return error response
            Log::error('Error occurred in ClubController@index: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'Error occurred while processing the request.'], 500);
        }
    }

    /**
     * Store a newly created club in the storage.
     *
     * @param  \App\Http\Requests\StoreClubRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreClubRequest $request)
    {
        try {
            // Create a new Club and return a response
            $club = Club::create($request->all());
            return (new ClubResource($club))->response()->setStatusCode(201);
        } catch (\Exception $e) {
            // Log and return error response
            Log::error('Error occurred in ClubController@store: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'Error occurred while creating the club.'], 500);
        }
    }

    /**
     * Display the specified club.
     *
     * @param  \App\Models\Club  $club
     * @return \App\Http\Resources\ClubResource
     */
    public function show(Club $club)
    {
        try {
            // Return ClubResource for the specified club
            return new ClubResource($club);
        } catch (ModelNotFoundException $e) {
            // Log and return error response if the club is not found
            Log::error('Club not found in ClubController@show: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'Club not found.'], 404);
        } catch (\Exception $e) {
            // Log and return error response for other exceptions
            Log::error('Error occurred in ClubController@show: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'Error occurred while processing the request.'], 500);
        }
    }

    /**
     * Update the specified club in the storage.
     *
     * @param  \App\Http\Requests\UpdateClubRequest  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateClubRequest $request, Club $club)
    {
        try {
            // Update the specified Club and return a success message
            $club->update($request->all());
            return response()->json(['message' => 'Club updated successfully.']);
        } catch (\Exception $e) {
            // Log and return error response
            Log::error('Error occurred in ClubController@update: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'Error occurred while updating the club.'], 500);
        }
    }

    /**
     * Remove the specified club from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Club $club)
    {
        try {
            // Delete the specified Club and return a success response
            $club->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            // Log and return error response
            Log::error('Error occurred in ClubController@destroy: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'Error occurred while deleting the club.'], 500);
        }
    }
}
