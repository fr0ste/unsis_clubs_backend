<?php

namespace App\Filters;

use Illuminate\Http\Request;

/**
 * Class ClubFilter
 *
 * This class extends the ApiFilter class and provides specific configurations
 * for filtering request parameters related to a club.
 */
class ClubFilter extends ApiFilter
{
    /**
     * @var array $safeParams
     * An associative array where keys are the names of safe parameters
     * and values are arrays of allowed operators for that parameter.
     */
    protected $safeParams = [
        'clubName' => ['eq'],
        'description' => ['eq']
    ];

    /**
     * @var array $columnMap
     * An array that maps parameter names to column names in the Eloquent model.
     */
    protected $columnMap = [
        'clubName' => 'ClubName',
        'description' => 'Description'
    ];

    /**
     * @var array $operatorMap
     * An array that maps operator names to specific Laravel Eloquent operators.
     */
    protected $operatorMap = [
        'eq' => '='
    ];

    /**
     * Transforms request parameters into an array that can be used
     * to build a dynamic Eloquent query specific to clubs.
     *
     * @param Request $request The instance of the HTTP request.
     * @return array The array of conditions for the Eloquent query.
     */
    public function transform(Request $request)
    {
        // Call the transform method of the parent class to perform generic transformation.
        $eloQuery = parent::transform($request);

        // Here you can add additional logic specific to the ClubFilter class if necessary.

        return $eloQuery;
    }
}
