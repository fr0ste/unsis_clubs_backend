<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClubCollection;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Filters\ClubFilter;
use App\Http\Resources\ClubResource;
use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ClubController extends Controller
{
    // ...

    public function index(Request $request)
    {
        try {
            $filter = new ClubFilter();
            $queryItems = $filter->transform($request);

            $clubs = Club::where($queryItems);

            $includeAgenda = $request->query('includeAgenda');
            if ($includeAgenda) {
                $clubs = $clubs->with('agendaClubs');
            }

            return new ClubCollection($clubs->paginate()->appends($request->query()));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while processing the request.'], 500);
        }
    }

    public function store(StoreClubRequest $request)
    {
        try {
            $club = Club::create($request->all());
            return (new ClubResource($club))->response()->setStatusCode(201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while creating the club.'], 500);
        }
    }

    public function show(Club $club)
    {
        try {
            return new ClubResource($club);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Club not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while processing the request.'], 500);
        }
    }

    public function update(UpdateClubRequest $request, Club $club)
    {
        try {
            $club->update($request->all());
            return response()->json(['message' => 'Club updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while updating the club.'], 500);
        }
    }

    public function destroy(Club $club)
    {
        try {
            $club->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while deleting the club.'], 500);
        }
    }
}