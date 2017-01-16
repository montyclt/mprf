<?php namespace MontyCLT\HelloWord\Main\Controller;

use Carbon\Carbon;
use MPRF\Environment\Environment;
use MPRF\Request\Controller;
use MPRF\Request\Request;
use MPRF\Request\Response;

/**
 * Example class that show basic information.
 *
 * @package MontyCLT\HelloWord\Main\Controller
 */
class Status extends Controller {
    function get(Request $request) {
        $data = [
            'status' => 'MPRF Framework is working',
            'FWVersion' => Environment::i()->getFWRevision(),
            'APIVersion' => Environment::i()->getAPIVersion(),
            'APIName' => Environment::i()->getAPIName(),
            'APIAuthor' => Environment::i()->getAPIAuthor(),
            'date' => Carbon::now()
        ];

        return new Response($data);
    }
}