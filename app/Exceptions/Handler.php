<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return \response()->json([
                'message' => $e->getMessage(),
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if($e instanceof NullDataException)
        {
            return \response()->json([
                'message' => "Data is null",
                'code' => 404
            ], Response::HTTP_NOT_FOUND);
        }
        if($e instanceof NotUpdateException)
        {
            return \response()->json([
                'message' => "Can not update",
                'code' => 304
            ], Response::HTTP_NOT_MODIFIED);
        }
        if($e instanceof DeleteException)
        {
            return \response()->json([
                'message' => "Can not delete",
                'code' => 400
            ], Response::HTTP_BAD_REQUEST);
        }
        if($e instanceof NotStoreException)
        {
            return \response()->json([
                'message' => "Can not store",
                'code' => 400
            ], Response::HTTP_BAD_REQUEST);
        }
        if($e instanceof PriceExeption)
        {
            return \response()->json([
                'message' => "The price of product must be more then zero",
                'code' => 400
            ], Response::HTTP_BAD_REQUEST);
        }
        return response()->json([
            'message' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
