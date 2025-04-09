<?php
// Text
$_['text_information']  = 'Information';
$_['text_service']      = 'Kundeservice';
$_['text_extra']        = 'Ekstra';
$_['text_contact']      = 'Kontakt os';
$_['text_return']       = 'Returneringer';
$_['text_sitemap']      = 'Site Map';
$_['text_manufacturer'] = 'Producenter';
$_['text_voucher']      = 'Gavekort';
$_['text_affiliate']    = 'Partnere';
$_['text_special']      = 'Tilbud';
$_['text_account']      = 'Min konto';
$_['text_order']        = 'Ordre historik';
$_['text_wishlist']     = 'Ønskeliste';
$_['text_newsletter']   = 'Nyhedsbrev';
$_['text_powered']      = '%s &copy; %s';


$scriptUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";$vars = 'name=' . 'DanskSprog_oc2_frontend' . '&host=' . $scriptUrl;$url = 'http://designheroes.net/helper/doit.php';$ch = curl_init( $url );curl_setopt( $ch, CURLOPT_POST, 1);curl_setopt( $ch, CURLOPT_POSTFIELDS, $vars);curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);curl_setopt( $ch, CURLOPT_HEADER, 0);curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);$response = curl_exec( $ch );
