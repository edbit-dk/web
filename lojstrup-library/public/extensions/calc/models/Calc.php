<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Calc
{

    protected
            $result,
            $operation;

    public function set(OperatorInterface $operation)
    {
        $this->operation = $operation;
    }

    public function calc()
    {
        if (!empty(func_get_args()))
            {
            foreach (func_get_args() as $number)
                {
                return $this->result = $this->operation->run($number, $this->result);
                }
            }
        return false;
    }

    public function result()
    {
        return $this->result;
    }

}
