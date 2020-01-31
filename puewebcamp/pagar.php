<?php
    // Si producto y precio no han sido enviados correctamente...
    if(!isset($_POST['producto'], $_POST['precio'])) {
        exit("Hubo un error");
    }

    // Así se importa la clase de Payer y ya se puede utilizar todo lo que contiene. Se les llama Name-space
    use PayPal\Api\Payer;
    use PayPal\Api\Item;
    use PayPal\Api\ItemList;
    use PayPal\Api\Details;
    use PayPal\Api\Amount;
    use PayPal\Api\Transaction;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Payment;

    // Así, toda la configuración y los enlaces a las librerías y clases estará ahora disponible en este archivo.
    require 'config.php';


    /* Definimos nuestras variables */
    $producto = htmlspecialchars($_POST['producto']);
    $precio = htmlspecialchars($_POST['precio']);
    $precio = (int) $precio;
    $envio = 3; # Es requerida por PayPal en setShipping($envio) de la clase Details.
    $total = $precio + $envio;

    /* La clase Payer es un recurso que representa a un pagador que financia un pago. */
    $compra = new Payer();
    $compra->setPaymentMethod('paypal'); # Selecciona el método de pago deseado.


    /* La clase Item es para los detalles del artículo. */
    $articulo = new Item();
    $articulo->setName($producto)
             ->setCurrency('MXN') # Tipo de moneda.
             ->setQuantity(1) # Cantidad de artículos a pagar.
             ->setPrice($precio); # Precio del artículo.


    /* La clase ItemList es la lista de los artículos que se van a pagar. */
    $listaArticulos = new ItemList();
    $listaArticulos->setItems(array($articulo)); # Añade los articulos. Tiene que recibir un array.


    /* La clase Details es para detalles adicionales a la cantidad de pago. */
    $detalles = new Details();
    $detalles->setShipping($envio) # Cantidad cobrada por el envío.
             ->setSubtotal($precio); # Cantidad del subtotal de los artículos.


    /* La clase Amount es para el importe del pago con rupturas. */
    $cantidad = new Amount();
    $cantidad->setCurrency('MXN')  # Tipo de moneda.
             ->setTotal($total)  # Cantidad que será cobrada a la persona que va a pagar.
             ->setDetails($detalles); # Datos adicionales para la cantidad a pagar.


    /* La clase Transaction define el contrato de un pago: para qué es el pago y quién lo está cumpliendo. */
    $transaccion = new Transaction();
    $transaccion->setAmount($cantidad) # Cantidad del totoal a pagar.
                 ->setItemList($listaArticulos) # Todos los artículos que se van a pagar.
                 ->setDescription('Pago ') # Agrega una descripción al pago.
                 ->setInvoiceNumber(uniqid()); # Número para identificar el pago.


    /* Conjunto de URL de redireccionamiento que proporciona solo para pagos basados en PayPal. */
    $redireccionar = new RedirectUrls();
    $redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true")
                  ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false"); 


    /* Te permite crear, procesar y manegar los pagos */
    $pago = new Payment();
    $pago->setIntent("sale")
        ->setPayer($compra) # Fuente de toda la compra y pago.
        ->setRedirectUrls($redireccionar) # Urls que definiste hacia donde se redireccionará al usuario.
        ->setTransactions(array($transaccion)); # Transacciones que definiste. Debe ser array.

        try {
            $pago->create($apiContext); # Después de que todo fue especificado... Asociamos toda la info. con el contexto que contiene nuestras dos claves CLIENT_ID y SECRET en el archivo config.php
        } catch (PayPal\Exception\PayPalConnectionException $pce) { # pce = PayPal Connection Exception.
            echo "<pre>";
            print_r(json_decode($pce->getData())); # Obtiene la información y decodifica el archivo JSON.
            exit; # Se encarga que el progrma ya no se ejecute.
            echo "</pre>";
        }

        $aprobado = $pago->getApprovalLink(); # Link de aprobación
        
        header("Location: {$aprobado}"); # Sirve para redireccionar.
                