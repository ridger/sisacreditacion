<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/solicitudes_docentes_eu.php';
//require_once '../model/alumno.php';

class solicitudes_docentes_euController extends Controller {

    public function index() {
          $data['solicitudes_docentes_eu']=  $this->grilla_solicitudes_docentes_eu();  
         $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/solicitudes_docentes_eu/_Index.php');
       
        $view->setLayout('../template/Layout2.php');
        
        $view->render();
         
        
         }
         public  function Parametros ()
         {
           $envio=$this->Datos_grilla(array('filtro' => 'CodigoSemestre','criterio' => $_POST['CodigoSemestre']));      
                echo $envio ;
            
             
         }

            public  function Parametros_facultad ()
         {
           $envio=$this->Datos_grilla_facultad(array('filtro' => 'CodigoFacultad','criterio' => $_POST['CodigoFacultad']));      
                echo $envio ;
            
             
         }
         
            public function save() {
        $obj = new solicitudes_docentes_eu();

        $p = $obj->update($_POST);
        if ($p[0]) {
            if ($_POST['estado'] == 'aceptado') {
                $this->insertarDetalle_asistencia_docentes($_POST);
            }
            header('Location: index.php?controller=solicitudes_docentes_eu');
        } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] = 'index.php?controller=solicitudes_docentes_eu';
            $view->setData($data);
            $view->setTemplate('../view/_Error_App.php');
            $view->setLayout('../template/Layout.php');
            $view->render();
        }
    }
         public function insertarDetalle_asistencia_docentes() {
        $obj = new solicitudes_docentes_eu();
        $obj->InsertDet_asistencia_docentes($_REQUEST);
        header('Location: index.php?controller=solicitudes_docentes_eu');
        $data = array();
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Error_App.php');
        echo $view->renderPartial();
    }



}

?>
