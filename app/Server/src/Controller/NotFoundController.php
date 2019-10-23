<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:13 PM
 */

namespace Server\Controller;

class NotFoundController extends AbstractController implements ControllerInterface, ExceptionReportingInterface {

    /** @var \Exception|null */
    protected $exception;

    public function index()
    {
        if ($this->exception == null) {
            $this->exception = new \Exception('Unknown error!');
        }

        $this->exception($this->exception);
    }

    public function exception(\Exception $e)
    {
        echo '<p style="font-weight:bold;">Ran into a problem here</p> <br /><pre>';
        print_r($e);
        echo '</pre>';
    }

}