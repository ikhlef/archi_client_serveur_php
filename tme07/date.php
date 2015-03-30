<?php
echo date("M d Y H:i:s", mktime(0, 0, 0, 1, 1, 1998));
echo "<br>";
echo gmdate("Ymd\THis", time());
?>