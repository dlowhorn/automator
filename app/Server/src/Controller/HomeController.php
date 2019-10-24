<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:13 PM
 */

namespace Server\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController implements ControllerInterface {

    public function handleRequest(Request $request)
    {
        $this->renderTemplate('home', [
            'time' => time(),
        ]);
    }

}