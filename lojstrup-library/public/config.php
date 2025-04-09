<?php

define('DEBUG', true);
define('CACHE', false);

define('AUTOLOAD_PATHS', serialize(array(
    'src/libs/base',
    'src/libs/helpers/frontend',
    'src/libs/helpers/backend',
    'src/libs/helpers/security',
    'src/libs/interfaces',
    'src/libs/storage',
    'app/data/models',
    'public/extensions/language/models',
    'public/extensions/language',
    'public/extensions/auth',
    'public/extensions/upload'
)));

define('DB_TYPE', 'mysql');
define('DB_HOST', 'sde.websupport.dk');
define('DB_NAME', 'thom855j_LoejstrupBibliotek');
define('DB_USER', 'thom855j_sde');
define('DB_PASS', 'sde101292');
