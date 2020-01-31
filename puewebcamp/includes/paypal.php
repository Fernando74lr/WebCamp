<?php
    /** En este archivo es donde se guardan las llaves de PayPal (configuración). **/

    # Así se instala la API que creamos desde PayPal Developer.
    require 'paypal/autoload.php';

    define('URL_SITIO', 'http://localhost/WebCamp/puewebcamp/');

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            // Cliente ID.
            'Ae7vhaNmoeijaZLSRIDCP27jSOwXanquQ1UhZ-49YSnIq3f8dWNJncxoCYF1-joqOzgSO6zhGbU2zabz',
            // Secret.
            'EERMUZmgx87-fLubhhctiKJ_eMsP8m1Ceurh4JC65MCIaLO0JJuN0wG-DYun02OBNBQQPenJxvVPDRq6'
        )
    );