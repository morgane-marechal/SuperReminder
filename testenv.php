
<?php
$env = parse_ini_file('Model/.env');

$user = $env["ADMIN_USERNAME"];
echo $user;
$mp = $env["ADMIN_PASSWORD"];
echo $mp;
$host = $env["ADMIN_HOST"];
echo $host;

?>