--TEST--
Test session_set_save_handler() function : variation
--EXTENSIONS--
session
--FILE--
<?php

ob_start();

echo "*** Testing session_set_save_handler() : variation ***\n";

require_once "save_handler.inc";
$path = __DIR__ . '/session_set_save_handler_variation2';
@mkdir($path);
session_save_path($path);
var_dump(session_start());
var_dump(session_set_save_handler("open", "close", "read", "write", "destroy", "gc"));
var_dump(session_destroy());

ob_end_flush();
?>
--CLEAN--
<?php
$path = __DIR__ . '/session_set_save_handler_variation2';
rmdir($path);
?>
--EXPECTF--
*** Testing session_set_save_handler() : variation ***
bool(true)

Deprecated: session_set_save_handler(): Providing individual callbacks instead of an object implementing SessionHandlerInterface is deprecated in %s on line %d

Warning: session_set_save_handler(): Session save handler cannot be changed when a session is active (started from %s on line %d) in %s on line %d
bool(false)
bool(true)
