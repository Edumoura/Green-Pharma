<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;


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
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request ,AuthenticationException $exception){

        //var_dump($exception->guards());
        //exit;
        if($request->expectsJson()){
            return response()->json(['message'=>$exception->getMessage()], 401);
        }

       $guard = Arr::get($exception->guards(), 0);

       //print_r($guard);
       //exit;
        switch ($guard) {
            case 'admin':
                    return redirect()->guest(route('admin.login'));
                break;

            case 'colaborador':
                    return redirect()->guest(route('colab.login'));
                break;    
            
            default:
                    return redirect()->guest(route('login'));
                break;
        }

        

    }
}
