<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:51 PM
 */

namespace Server\Controller;


abstract class AbstractController {

    protected $params;

    /**
     * AbstractController constructor.
     *
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    public function redirect()
    {

    }

}