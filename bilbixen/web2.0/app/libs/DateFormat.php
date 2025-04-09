<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DateFormat {

    const YEAR = 31556926,
            Month = 2629744,
            WEEK = 604800,
            DAY = 86400,
            HOUR = 3600,
            MINUTE = 60;

    public static function getDay() {
        return date('1');
    }
    
      public static function getToday() {
        return getdate();
    }

    public static function getDMY($timestamp) {
        return date('D-M-Y', $timestamp);
    }

    public static function getDMYT($timestamp) {
        return date('D-M-Y H:i:s', $timestamp);
    }

    public static function getdmy($timestamp) {
        return date('d-m-y', $timestamp);
    }

    public static function getdmyt($timestamp) {
        return date('d-m-y H:i:s', $timestamp);
    }
    
    public static function setdmyt($timestamp) {
        return date('d-m-y H:i:s', $timestamp);
    }

    public static function getYDM($timestamp) {
        return date('Y-D-M', $timestamp);
    }

    public static function getydm($timestamp) {
        return date('y-d-m', $timestamp);
    }

}
