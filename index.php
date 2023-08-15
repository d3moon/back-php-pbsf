<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Origin: https://front-vue-pbsf.vercel.app");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once 'controllers/VaccineController.php';

$controller = new VaccineController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $controller->show($_GET['id']);
    } else {
        $controller->index();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $controller->update();
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $controller->destroy();
} elseif ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}
?>
