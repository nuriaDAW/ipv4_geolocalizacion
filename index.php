<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPV4 Geolocalización</title>
    <link rel="icon" href="img/geolocalization.svg" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
    error_reporting(0);
    require __DIR__ . '/vendor/autoload.php';

    use Foolz\Inet\Inet;
    use ipinfo\ipinfo\IPinfo;

    if (!empty($_REQUEST['num_ip'])) {

        $_REQUEST['num_ip'] = strip_tags(htmlspecialchars($_REQUEST['num_ip']));

        if (ctype_digit($_REQUEST['num_ip'])) {

            $ip =  \Foolz\Inet\Inet::dtop($_REQUEST['num_ip']);

            echo '<p>' . $ip . '</p>';
            echo '<hr />';

            $client = new IPinfo();
            $details = $client->getDetails($ip);

            echo '<div><i></i><span class="key"> ip: </span><span class="value">"' . $details->ip . '"</span></div>';
            echo '<div><i></i><span class="key"> city: </span><span class="value">"' . $details->city . '"</span></div>';
            echo '<div><i></i><span class="key"> region: </span><span class="value">"' . $details->region . '"</span></div>';
            echo '<div><i></i><span class="key"> country: </span><span class="value">"' . $details->country . '"</span></div>';
            echo '<div><i></i><span class="key"> loc: </span><span class="value">"' . $details->loc . '"</span></div>';
            echo '<div><i></i><span class="key"> postal: </span><span class="value">"' . $details->postal . '"</span></div>';
            echo '<div><i></i><span class="key"> timezone: </span><span class="value">"' . $details->timezone . '"</span></div>';
        } else {
            echo '<p>¡' . $_REQUEST['num_ip'] . ' no es un entero! &#128544;</p>';
        }
    } else { ?>
        <h2>Geolocalización de un número decimal</h2>
        <form action="" method="post" autocomplete="off">
            <label for="num_ip">Introduce el Nº entero:</label><br>
            <input type="number" pattern="^[0-9]+" id="num_ip" name="num_ip" placeholder="Introduce el Nº entero..."><br>
            <input type="submit" value="CALCULAR">
        </form>
</body>

</html>
<?php
    }
