<?php
ini_set('display_errors',1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT );
require __DIR__ . '/../bootstrap/front.php';

