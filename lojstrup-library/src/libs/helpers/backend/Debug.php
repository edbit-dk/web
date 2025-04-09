<?php

class Debug
{

    public
            function usage()
    {
        return getrusage();
    }

    public
            function runtime($ru, $rus, $index)
    {
        return ($ru["ru_$index.tv_sec"] * 1000 + intval($ru["ru_$index.tv_usec"] /
                        1000))
                - ($rus["ru_$index.tv_sec"] * 1000 + intval($rus["ru_$index.tv_usec"] /
                        1000));
    }

}
