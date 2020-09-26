<?php 

require_once('./Controllers/Controller.php');
require_once('./Models/CRUDFilms.php');


class DeleteFilmController extends Controller
{      
    
    public function execute() {
        
        try {
            
            $id = $_POST['id'];    
            $deleteFilmOk = CRUDFilms::deleteFilmById($id);

            $response = new stdClass();
            if($response) {             
                $response->delete = true;
            }
            else {
                $response->delete = false;
            } 
            
            header('Content-type: application/json');
            echo json_encode($response);

        }
        catch(Exception $e) {
            echo $e->getMessage();
        }  
    }

}

?>