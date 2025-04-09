<?php
// Text
$_['text_title']				= 'Klarna Invoice - Pay within 14 dags';
$_['text_terms_fee']			= '<span id="klarna_invoice_toc"></span> (+%s)<script type="text/javascript">var terms = new Klarna.Terms.Invoice({el: \'klarna_invoice_toc\', eid: \'%s\', Land: \'%s\', charge: %s});</script>';
$_['text_terms_no_fee']			= '<span id="klarna_invoice_toc"></span><script type="text/javascript">var terms = new Klarna.Terms.Invoice({el: \'klarna_invoice_toc\', eid: \'%s\', Land: \'%s\'});</script>';
$_['text_additional']			= 'Klarna Invoice requires some additional information before they can proccess your order.';
$_['text_male']					= 'Mand';
$_['text_female']				= 'Kvinde';
$_['text_year']					= 'år';
$_['text_month']				= 'måned';
$_['text_day']					= 'dag';
$_['text_comment']				= 'Klarna\'s Faktura ID: %s. ' . "\n" . '%s/%s: %.4f';

// Entry
$_['entry_gender']				= 'Køn';
$_['entry_pno']					= 'Personligt nummer';
$_['entry_dob']					= 'Fødselsdato';
$_['entry_phone_no']			= 'Telefon';
$_['entry_street']				= 'Vejnavn';
$_['entry_house_no']			= 'Nummer';
$_['entry_house_ext']			= 'etage/side';
$_['entry_company']				= 'Firma registreringsnummer';

// Help
$_['help_pno']					= 'Indtast dit CPR-nummer her.';
$_['help_phone_no']				= 'Indtast venligst din Telefon nummer.';
$_['help_street']				= 'Bemærk venligst, at levering kun kan ske til den registrerede adresse, når du betaler med Klarna.';
$_['help_house_no']				= 'Indtast venligst din husnummer.';
$_['help_house_ext']			= 'Vedlæg dit hus udvidelse her. Fx A, B, C, rød, blå osv.';
$_['help_company']				= 'Indtast dit firma\'s registreringsnummer';

// Error
$_['error_deu_terms']			= 'Du skal acceptere Klarna\'s fortrolighedspolitik (Datenschutz)';
$_['error_address_match']		= 'Billing og Shipping addresses must match if you want to use Klarna Invoice';
$_['error_network']				= 'Der opstod en fejl under tilslutning til Klarna. Prøv venligst igen senere.';