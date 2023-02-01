<?php
require_once "views/menu/head.php";
require_once "models/class/Videoclub.php";

$tablasValidas = ["cliente"];


if (isset($_REQUEST["tabla"], $_REQUEST["accion"])) {
    $tabla = $_REQUEST["tabla"];
    if (!in_array($tabla, $tablasValidas)) {
        require_once("views/404.php");
    } else {
        switch ($_REQUEST["accion"]) {
            case "include":
                require_once("views/$tabla/create.php");
                break;
            case "store":
                require_once("views/$tabla/store.php");
                break;
            case "show":
                require_once("views/$tabla/show.php");
                break;
            case "list":
                require_once("views/$tabla/list.php");
                break;
            case "search":
                require_once("views/$tabla/search.php");
                break;
            case "delete":
                require_once("views/$tabla/delete.php");
                break;
            case "edit":
                require_once("views/$tabla/edit.php");
                break;
            default:
                require_once("views/404.php");
                break;
        }
    }
} else if (substr($_SERVER["REQUEST_URI"], -9) == "index.php") { // Vista Por defecto
?>
    BIENVENIDO A LA APLICACION
<?php
} else require_once("views/404.php");

require_once("views/menu/footer.php");
