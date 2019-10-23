<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:14 PM
 */

namespace Server\Controller;

interface ExceptionReportingInterface {

    /**
     * @param \Exception $e
     *
     * @return mixed
     */
    function exception(\Exception $e);

}