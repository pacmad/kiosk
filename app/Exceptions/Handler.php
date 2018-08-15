<?php

namespace RP\Kiosk\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param Request  $request
     * @param Exception $exception
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        if (config('app.debug') === false && !in_array(get_class($exception), $this->dontReport) && !in_array(get_class($exception), $this->internalDontReport)) {
            $exceptionCode = ($exception->getCode() === 0 ? 500 : $exception->getCode());
            $viewData = [
                'request' => $request,
                'exception' => $exception
            ];

            return response()->view('errors.default', $viewData, $exceptionCode);
        }

        return parent::render($request, $exception);
    }
}
