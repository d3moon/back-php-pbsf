<?php
require_once 'models/VaccineModel.php';

class VaccineController {
    private $vaccineModel;

    public function __construct() {
        $this->vaccineModel = new VaccineModel();
    }

    public function index() {
        $vaccines = $this->vaccineModel->getAll();
        header('Content-Type: application/json');
        echo json_encode($vaccines);
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->vaccineModel->create($data);
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Vaccine created'));
    }

    public function update() {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->vaccineModel->update($data);
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Vaccine updated'));
    }

    public function show($id) {
        $vaccine = $this->vaccineModel->getById($id);
        header('Content-Type: application/json');
        if ($vaccine) {
            echo json_encode($vaccine);
        } else {
            echo json_encode(array('message' => 'Vaccine not found'), 404);
        }
    }

    public function destroy() {
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id']; 
        header('Content-Type: application/json');
        if ($this->vaccineModel->delete($id)) {
            http_response_code(200); 
            echo json_encode(array('message' => 'Vaccine deleted'));
        } else {
            http_response_code(500);
            echo json_encode(array('message' => 'Vaccine deletion failed'));
        }
    }
}
?>
