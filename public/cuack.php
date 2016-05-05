<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <link rel="stylesheet" href="">
</head>
<body>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$referrer = $_SERVER['HTTP_REFERER'];
echo "<b>IP address:</b><br/>" . $ip . "<br/>";
echo "<b>Browser (User Agent) Info:</b><br/>" . $browser . "<br/>";
echo "<b> Usted est&aacute; intentando acceder a un lugar inexistente, y est&aacute; siendo registrado, por favor pinche <a href='/' class='btn btn-primary'>aqu&iacute;</a> para volver a la p&aacute;gina principal, lamentamos el inconveniente. </b>";
?>
</body>
</html>


