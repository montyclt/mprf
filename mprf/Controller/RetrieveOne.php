<?php namespace MPRF\Controller;

use MPRF\Request\Request;
use MPRF\Request\Response;

trait RetrieveOne {

    function get(Request $request) {
        $model = $this->retrieve_model;
        $object = $model::find($request->getParam('retrieve_id'));
        return new Response($object->toArray());
    }
}