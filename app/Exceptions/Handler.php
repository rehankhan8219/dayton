<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\Traits\ApiResponse;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        GeneralException::class
    ];

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($request->wantsJson()){
            if($exception instanceof ModelNotFoundException) {
                $model = explode('\\', $exception->getMessage());
                return $this->respondWithError(str_replace(']', '', end($model)). ' not found!', 404, 404);
            }
            
            if($exception instanceof AuthenticationException) {
                return $this->respondWithError($exception->getMessage(), 401, 401);
            }
            
            if($exception instanceof NotFoundHttpException) {
                return $this->respondWithError('Api endpoint not found!', 401, 401);
            }
            
            if($exception instanceof ValidationException) {
                return $this->respondWithError(collect($exception->errors())->first(), 422, 422);
            }
            
            $additional_data = [];
            if($exception->getCode() == 403) {
                $additional_data['error_code'] = 'EMAIL_VERIFICATION_FAILED';
                $user = session()->pull('attemptedUser');
                if($user) {
                    $additional_data['token'] = $user->id.'-'.md5($user->email);
                }
            }

            return $this->respondWithError($exception->getMessage(), 500, 500);
        }

        if ($exception instanceof UnauthorizedException) {
            return redirect()
                ->route(homeRoute())
                ->withFlashDanger(__('You do not have access to do that.'));
        }

        if ($exception instanceof AuthorizationException) {
            return redirect()
                ->back()
                ->withFlashDanger($exception->getMessage() ?? __('You do not have access to do that.'));
        }

        if ($exception instanceof ModelNotFoundException) {
            return redirect()
                ->route(homeRoute())
                ->withFlashDanger(__('The requested resource was not found.'));
        }

        return parent::render($request, $exception);
    }
}
