<?php
    /**
     * Importo i file necessari
     */
    include_once("config.php");

    /**
     * Importo i file di classe
     */
    include_once(CLASS_PATH . "module.class.php");
    include_once(CLASS_PATH . "language.class.php");
    

    if(!isset($GET["page"])){
        $nome_modulo = "home";
    } else {
        $nome_modulo= $GET["page"];
    }

    if(!isset($_COOKIE["lang"])){
        $_COOKIE["lang"]= "ita";
    }

    $Module = new Module($nome_modulo);

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    <script src="node_modules/jquery/src/jquery.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo($Module->checkCssExists())?>" />
</head>
<body>
    <?php
        include_once($Module->getPhpFile());
    ?>  
</body>

<script src="lib/ts/main.ts"></script>
<script src="<?php echo($Module->checkTsExists());?>"></script>
</html>