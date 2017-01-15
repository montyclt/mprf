<?php namespace MontyCLT\HelloWord\Main\Controller;

use MPRF\Request\Controller;
use MPRF\Request\Request;
use MPRF\Request\Response;
use MontyCLT\HelloWord\Main\Model\User as M_User;

/**
 * Class User
 *
 * @package MontyCLT\HelloWorld\Main\Controller
 */
class User extends Controller {

    /**
     * Get details from a user.
     *
     * @param Request $request
     * @return Response
     */
    function get(Request $request) {
        $user = M_User::find($request->getParam('user_id'));
        return new Response($user->toArray());
    }
}