<?php
include_once("../lib/dbfactory.php");
class departamentoacademico extends Main{   
    
    public $opt;
    function index($query,$p,$c) {        
        $sql = "SELECT
                    CodigoDptoAcad,DescripcionDepartamento,EstadoDpto,Abreviatura
                    FROM
                    departamentoacademico
                where ".$c." like :query";         
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );        
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );        
        return $data;
    }       
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM departamentoacademico WHERE CodigoDptoAcad = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($_P ) {
           
            $sentencia=$this->db->query("SELECT COUNT(CodigoDptoAcad) as cant from departamentoacademico");         
         $ct=$sentencia->fetch();      
          $xd=1+ (int)$ct['cant'];
          
        $sql = $this->Query("sp_departamentoacademico_iu(0,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1',$xd , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionDepartamento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['EstadoDpto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['Abreviatura'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    
    
    function update($_P ) {
        
        $sql = $this->Query("sp_departamentoacademico_iu(1,:p1,:p2,:p3,:p4)");
        $stmt = $this->db->prepare($sql);
        
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['CodigoDptoAcad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['DescripcionDepartamento'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['EstadoDpto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['Abreviatura'] , PDO::PARAM_STR);
       
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($p) {
        $stmt = $this->db->prepare("DELETE FROM departamentoacademico WHERE CodigoDptoAcad = :p1");
        $stmt->bindValue(':p1', $p, PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
