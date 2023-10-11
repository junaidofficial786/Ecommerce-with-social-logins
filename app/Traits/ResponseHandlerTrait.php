<?php

namespace App\Traits;

trait ResponseHandlerTrait
{
    protected function conditionalRedirectOrBack(
        array $result,
        bool $returnView = false,
        string $view = null,
        bool $redirect = false,
        string $routeName = null
    ): mixed {
        if (!$result['status']) {
            //something went was wrong. display errors
            return back()->with('error', $result['message']);
        }

        if ($returnView) {
            return view($view, ['data' => $result['data']]);
        } elseif ($redirect) {
            return redirect()->route($routeName, ['data' => $result['data']]);
        } else {
            return back()->with('success', $result['message']);
        }
    }
}
