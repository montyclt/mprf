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
        if ($user)
            return new Response($user->toArray());
        return new Response(null, Response::HTTP_404_NOT_FOUND);
    }

    /**
     * Create new user.
     *
     * @param Request $request
     * @return Response
     */
    function post(Request $request) {
        //TODO validate input
        $user = new M_User($request->getData());
        $user->save();
        return new Response($user->toArray(), Response::HTTP_201_CREATED);
    }

    function delete(Request $request) {
        $user = M_User::find($request->getParam('user_id'));
        $user->delete();
        return new Response(null, Response::HTTP_204_NO_CONTENT);
    }
}