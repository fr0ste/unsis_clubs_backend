<?php

namespace App\Filters;

use Illuminate\Http\Request;

/**
 * Class ApiFilter
 *
 * This class provides functionalities to filter and transform request parameters
 * into dynamic Eloquent queries for API in Laravel.
 */
class ApiFilter
{
    /**
     * @var array $safeParams
     * An associative array where keys are the names of safe parameters
     * and values are arrays of allowed operators for that parameter.
     */
    protected $safeParams = [];

    /**
     * @var array $columnMap
     * An array that maps parameter names to column names in the Eloquent model.
     */
    protected $columnMap = [];

    /**
     * @var array $operatorMap
     * An array that maps operator names to specific Laravel Eloquent operators.
     */
    protected $operatorMap = [];

    /**
     * Transforms request parameters into an array that can be used
     * to build a dynamic Eloquent query.
     *
     * @param Request $request The instance of the HTTP request.
     * @return array The array of conditions for the Eloquent query.
     */
    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            // Check if the parameter is present in the request
            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                // Add the condition to $eloQuery if the operator is present in the request
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
