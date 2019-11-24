<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:14 PM
 */

namespace Server\Controller;

use Symfony\Component\HttpFoundation\Request;

interface ControllerInterface {

    function handleRequest(Request $request);

}