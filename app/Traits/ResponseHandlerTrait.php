<?php

namespace App\Traits;

trait ResponseHandlerTrait
{
    /**
     * this function decides if API resulted in success of error
     *
     *@param  array  $result The result of the API execution.
     *@param  array|object  $data The data to be included in the JSON response.
     *@param  int  $successCode The success code to be used in the JSON response.
     *@param  int  $errorCode The error code to be used in the JSON response.
     *return mixed
     */
    protected function conditionalRedirectOrBack(array $result, bool $redirect = false, string $view = null): mixed
    {
        if (! $result['status']) {
            //something went was wrong. display errors
            return back()->with('error', $result['message']);
        }

        //if redirection is required then redirect, else move back with success message
        return $redirect ? view($view, $result['data']) : back()->with('success', $result['message']);
    }
}
