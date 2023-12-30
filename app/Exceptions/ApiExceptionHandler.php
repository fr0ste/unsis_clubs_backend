<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiExceptionHandler extends ExceptionHandler
{
    public function render($request, \Throwable $exception)
    {
        // Log de todas las excepciones
        Log::error('Exception occurred: ' . $exception->getMessage(), ['exception' => $exception]);

        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if ($exception instanceof ModelNotFoundException) {
            return $this->modelNotFoundResponse();
        }

        if ($exception instanceof HttpException) {
            return $this->convertHttpExceptionToResponse($exception, $request);
        }

        return $this->genericErrorResponse();
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        // Log para excepciones de validación
        Log::error('ValidationException occurred: ' . json_encode($errors), ['exception' => $e]);

        return response()->json(['errors' => $errors], 422);
    }

    protected function modelNotFoundResponse()
    {
        // Log para excepciones de modelo no encontrado
        Log::error('ModelNotFoundException occurred: Resource not found.');

        return response()->json(['error' => 'Resource not found.'], 404);
    }

    protected function convertHttpExceptionToResponse(HttpException $e, $request)
    {
        // Log para excepciones HTTP
        Log::error('HttpException occurred: ' . $e->getMessage(), ['exception' => $e]);

        return response()->json(['error' => $e->getMessage()], $e->getStatusCode());
    }

    protected function genericErrorResponse()
    {
        // Log para excepciones genéricas
        Log::error('Generic Exception occurred.');

        return response()->json(['error' => 'Something went wrong.'], 500);
    }
}
