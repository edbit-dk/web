<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Timer
{

    private
            $startTime;
    private
            $endTime;

    public
            function __construct()
    {
        $this->startTime = 0;
        $this->endTime = 0;
    }

    private
            function getTimestamp()
    {
        $timeofday = gettimeofday();
        //RETRIEVE SECONDS AND MICROSECONDS (ONE MILLIONTH OF A SECOND)
        //CONVERT MICROSECONDS TO SECONDS AND ADD TO RETRIEVED SECONDS
        //MULTIPLY BY 1000 TO GET MILLISECONDS
        return 1000 * ($timeofday['sec'] + ($timeofday['usec'] / 1000000));
    }

    public
            function startCounter()
    {
        $this->startTime = $this->getTimestamp();
    }

    public
            function stopCounter()
    {
        $this->endTime = $this->getTimestamp();
    }

    public
            function getElapsedTime()
    {
        //RETURN DIFFERECE IN MILLISECONDS
        return number_format(($this->endTime) - ($this->startTime), 2);
    }

}
