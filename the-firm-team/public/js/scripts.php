<?php
/**
 * On-the-fly Javascript Compression
 * Copyright (c) 2009 and onwards, Manas Tungare.
 * Creative Commons Attribution, Share-Alike.
 *
 * In order to minimize the number and size of HTTP requests for js content,
 * this script combines multiple js files into a single file and compresses
 * it on-the-fly.
 *
 * To use this in your HTML, link to it in the usual way:
 * <script  href="/js/compressed.js.php" ></script>
 */
/* Add your CSS files to this array (THESE ARE ONLY EXAMPLES) */
$jsFiles = array(
    "app.js",
    "valid.js"
);

/**
 * Ideally, you wouldn't need to change any code beyond this point.
 */
$buffer = "";
foreach ($jsFiles as $jsFile) {
    $buffer .= file_get_contents($jsFile);
}

// Remove comments
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);

// Remove space after colons
$buffer = str_replace(': ', ':', $buffer);

// Remove whitespace
$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);

// Enable GZip encoding.
ob_start("ob_gzhandler");

// Enable caching
header('Cache-Control: public');

// Expire in one day
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');

// Set the correct MIME type, because Apache won't set it for us
header("Content-type: text/javascript; charset: UTF-8");

// Write everything out
echo($buffer);

