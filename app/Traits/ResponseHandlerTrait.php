<?php

namespace App\Traits;

trait ResponseHandlerTrait
{
    /**
     * @param array $result
     * @param bool $redirect
     * @param string|null $view
     * @return mixed
     */
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
