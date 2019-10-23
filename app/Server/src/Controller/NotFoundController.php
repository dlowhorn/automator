<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:13 PM
 */

namespace Server\Controller;

class NotFoundController extends AbstractController  implements ExceptionReportingInterface {

    public function exception(\Exception $e)
    {
        echo '<p style="font-weight:bold;">Ran into a problem here</p> <br /><pre>';
        print_r($e);
        echo '</pre>';
    }

}