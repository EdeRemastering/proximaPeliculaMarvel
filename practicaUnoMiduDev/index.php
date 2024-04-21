<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesión cURL; ch = cURL handle

$ch = curl_init(API_URL);

// Indicar que queremos recibir sin que lo muestre en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# Alternativa para obtener una API
# $result = file_get_contents(API_URL); # Cuando sólo se quiere hacer el GET de una API.

$result = curl_exec($ch);

$data  = json_decode($result, true);

curl_close($ch);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de marvel</title>
</head>
<body>
    <main>
    

        <section>   
        <h2>La próxima película de marvel</h2> 
            <img src="<?= $data["poster_url"]; ?>" width="300" style="border-radius: 20px" alt="Poster de <?= $data["title"] ?>"/>
        </section>  

        <hgroup>
            <h3><?= $data["title"]; ?> se estrena en: <?= $data["days_until"]; ?> días</h3>
            <p>Fecha de estreno: <?= $data["release_date"];["title"]; ?></p>
            <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
        </hgroup>
    </main>
</body>
</html>

<style>
:root{
    color-scheme: light dark;
}
    
    *{margin: 0;}

    body {
        display: grid;
        place-content: center;
    }

    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 2rem;
    }
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    h2 {
        margin-top: 1.5rem;
        margin-bottom: 1.5em;
    }


</style>
