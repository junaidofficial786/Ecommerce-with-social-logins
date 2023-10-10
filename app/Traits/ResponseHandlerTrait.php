<?php

namespace App\Traits;

trait ResponseHandlerTrait
{
    protected function conditionalRedirectOrBack(array $result, bool $redirect = false, string $view = null): mixed
    {
        if (! $result['status']) {
            //something went was wrong. display errors
            return back()->with('error', $result['message']);
        }

        //if redirection is required then redirect, else move back with success message
        return $redirect ? view($view, ['data' => $result['data']]) : back()->with('success', $result['message']);
    }
}
