<?php 
    const API_ULR = "https://www.whenisthenextmcufilm.com/api";

    /*
        Una alternativa seria utilizar file_get_contents
        %result = file_get_contents(API_ULR);
        si solo quieres hacer un get de una api 
    */

    # Inicializar una nueva sesión de CURL; ch = CURL handle
    $ch = curl_init(API_ULR); 
    // Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*
        Ejecutar la peticion
        y la guardamos el resultado 
    */ 
    $result = curl_exec($ch);
    # Pone en un array asociativo el resultado para no tenerlo como cadena de texto
    $data = json_decode($result, true);
    # Cerrar la sesión de CURL
    curl_close($ch);
    # Mostrar el resultado
    // var_dump($data);
?>
<head>
    <title>
        La próxima pelicula de Marvel
    </title>
    <meta name="description" content="La próxima pelicula de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>
<main>
    <section>
        <h2>
            La próxima pelicula de Marvel
        </h2>
        <img 
        src="<?= $data["poster_url"]; ?>" 
        width="300" 
        alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 10px;">
    </section>
    <hgroup>
        <h3>
            <?= $data["title"]; ?> se estrena en  <?= $data["days_until"]; ?> días
        </h3>
        <p>
            Fecha de estreno: <?= $data["release_date"]; ?>
        </p>
        <p>
            La siguiente pelicula es: <?= $data["following_production"]["title"]; ?>
        </p>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: light dark;
    }

    body{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 100vh; 
        margin: 0; 
    }

    section{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

</style>