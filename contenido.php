<?php
include 'lib/dbfactory.php';
include 'model/Main.php';

        $obj = new Main();
        $data = array();

        $data['rows'] = $obj->getDatos_web_informativo();
        $data['rows2'] =  $obj->getDatos_web_evento();
        $data['rows3'] = $obj->getDatos_web_noticias();
        $data['rows4'] = $obj->getDatos_web_contenido();
        $data['rows5'] = $obj->getDatos_web_desarrolladores();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];

?>
<script>
    $(function () {
        $("#cambio_contrasena").dialog({
            autoOpen: false,
            width: 400,
              show: {
                effect: "blind",
                duration: 1000
              },
              hide: {
                effect: "explode",
                duration: 1000
              },
      
            buttons: [
                {
                    text: "Ok",
                    click: function () {
                        if($("#nueva_contracena").val()==$("#nueva_contracena_confirm").val()){
                        str = $("#frm_reg_cont").serialize();
                        $.post('web/process_cont.php', str, function (data) {

                        });
                        $(this).dialog("close");
                    }else{alert('Error: Los Datos No Coinciden');}}
                },
                {
                    text: "Cancel",
                    click: function () {
                        $(this).dialog("close");
                    }
                }
            ],
        });
        jQuery.fn.mostar_reg_contra = function () {
            $("#cambio_contrasena").dialog("open");
        };
        $("#nueva_contracena_confirm").keyup(function () {
            if ($("#nueva_contracena").val() != $("#nueva_contracena_confirm").val()) {
                $("#msg_e").html('<span style="color:red;">los Datos No Coinciden</span>');
            }
            else {
                $("#msg_e").html('<span style="color:blue;"> Las Contraseñas coinciden</span>');
            }
        });

    });

</script>
<?php if ($_GET['peticionCambio'] == 'true') {
    echo "<script>
    $(function () {  $().mostar_reg_contra() ; });</script>";
} ?>
<!--
<div id="cambio_contrasena" title="Cambio De Contrasena">
    <form id="frm_reg_cont"> 
        <input type="hidden" id="codigo" name="codigo" value="<?php echo $_GET['codigo'];?>">
        <input type="hidden" id="perfil" name="perfil" value="<?php echo $_GET['perfil'];?>"> 
        <table class="table-hover">
            <tr>
                <td> CONTRASEÑA </td><td><input type="password" id="nueva_contracena" name="nueva_contracena" placeholder="nueva contraseña"></td></tr>
            <tr>
                <td> CONFIRMAR </td><td><input type="password" id="nueva_contracena_confirm" placeholder="confirmar contraseña"></td>
            </tr>
            <tr>
                <td colspan="2" ><br>&nbsp;<div id="msg_e" align="center"></div></td>
            </tr>
        </table>
    </form>
</div>
-->
<div class="container well" style="margin-bottom: 10px;">

  

<div class="row">
        <div class="col-md-8 panel-body" style="background-color:#75289A;">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

            <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php 
        $cont=1;
foreach ($data["rows"] as $key => $value) {
    if($cont==1){
echo '<div class="item active">
                    <img style="width: 800px; height:200px;" src="web/images/slider/'.$value[2].'" alt="...">
                    <div class="carousel-caption" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                                    <b>'.$value[1].'</b>
                    </div>
                </div>';
    }else{
        echo '<div class="item">
                    <img style="width: 800px; height:200px;" src="web/images/slider/'.$value[2].'" alt="...">
                    <div class="carousel-caption" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                                    <b>'.$value[1].'</b>
                    </div>
                </div>';
    }
    ;

    $cont=$cont+1;
}
        ?>

                
                
                
            </div>
            


            <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                 </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="col-md-4" style="background-color:#611c82;">
            <div style="">
            
                <div style="clear: both;
    font-size: 18px;
    color: #fff;
    font-weight: bold;  
    padding: 0 0 10px 0;
    margin: 10px 0 15px 0; border-bottom:2px solid #2B0635;">NUESTROS PROYECTOS</div>
                
                <p style="font-size: 14px;
    line-height: 20px;
    color: #ffffff;
    margin-bottom: 20px; text-align:justify;">En la Universidad Nacional de San Martin emprende rigurosamente el rumbo hacia la acreditación,lo
                   en el cual presentan sus divesos proyectos n la Universidad Nacional de San Martin emprende rigurosamente</p>
                
              <div><button type="button" style="background-color:#CEACD7;color:#2B0635; font-weight: bold; border:2px solid #2B0635; margin-bottom: 15px;" class="btn btn-primary" data-toggle="button">Leer más</button></div>
            
            </div>
    </div>
    </div> 
    
    <div class="row" style="background-color:#E9E9E9;">
           <!--noticias-->

            
         <?php
         
                    $i=1;
 echo '<div class="col-md-5">
                        <div class="col-md-6" style=" padding-right: 3px; padding-left: 10px; ">';
                 $con=1; foreach ($data["rows3"] as $key => $value) { 
                       if($con<=2){
 echo     '<div>
                    <div id="bloque_3_titgen" class="col-md-12">
                           
                        <div id="bloque_2_tit" class="col-md-12" style=" padding-left: 0; padding-right: 0;">
                        
                        <h3 style="font-family:Calibri; font-size: 15px; color:white; text-align:left; margin-top:5px;">
                                <a class="" href="">
                                <b>'.utf8_encode(substr($value[1],0,56)).'...</b></a>
                                                
                        </h3>
                        </div>
                    </div>
                    <div class="view view-first">
                     <img style="width:100%; height:110px;" src="web/images/noticias/'.$value[3].'" ALT="">
                            <div class="mask">
                            <p>'.utf8_encode(substr($value[2],0,110)).' ...</p>
                                <a href="#" class="info">LEER MAS</a>
                            </div>
                        </div>
                    
                                                </div>';
       } $con=$con+1;}

 echo '</div>
       <div class="col-md-6" style=" padding-right: 3px; padding-left: 10px; ">';
 $con=1; foreach ($data["rows3"] as $key => $value) { 
                       if($con>=3 && $con <=4){
                         echo     '<div>
                    <div id="bloque_3_titgen" class="col-md-12">
                           
                        <div id="bloque_2_tit" class="col-md-12" style=" padding-left: 0; padding-right: 0;">
                        
                        <h3 style="font-family:Calibri; font-size: 15px; color:white; text-align:left; margin-top:5px;">
                                <a class="" href="">
                                <b>'.utf8_encode(substr($value[1],0,56)).'...</b></a>
                                                
                        </h3>
                        </div>
                    </div>
                    <div class="view view-first">
                            <img style="width:100%; height:110px;" src="web/images/noticias/'.$value[3].'" alt="" />
                            <div class="mask">
                            <p>'.utf8_encode(substr($value[2],0,110)).' ...</p>
                                <a href="#" class="info">LEER MAS</a>
                            </div>
                        </div>
                    
                                                </div>';   
                       } $con=$con+1;}
      echo '</div></div>';
echo '
        <div class="col-md-5" style=" height:390px; padding-left: 3px;">';
$con=1; foreach ($data["rows3"] as $key => $value) { 
                       if($con==5){
             echo'<div><div id="bloque_2_titgen" class="col-md-12">
                           
                    <div id="bloque_2_tit" class="col-md-12">
                    
                    <h3 style="font-family:Calibri; font-size: 22px; color:white; text-align:left; margin-top:5px;">
                            <a class="" href="">
                            <b>'.utf8_encode(substr($value[1],0,100)).'...</b></a>
                    </h3>
                    <h4 style="text-align : justify; font-family:Calibri; font-size: 12px; color:#CECFCF;">
                        '.utf8_encode(substr($value[2],0,225)).'...
                    </h4>
                    </div>
                    </div>
                    
                        <img style="width:100%; height:210px;" src="web/images/noticias/'.$value[3].'"alt="">
                    
                       </div>';}
$con=$con+1;}
        echo '</div> ';
 echo '<div class="col-md-2" style="height:390px; padding-left: 0; padding-right: 3px;" >';
$con=1; foreach ($data["rows3"] as $key => $value) { 
                       if($con>=6 && $con <=7){

echo '
            
                <div><div id="bloque_3_titgene" class="col-md-12">
                           
                    <div id="bloque_2_tit" class="col-md-12" style=" padding-left: 0; padding-right: 0;">
                    
                    <h3 style="font-family:Calibri; font-size: 15px; color:white; text-align:left; margin-top:5px;">
                            <a class="" href="">
                            <b>'.utf8_encode(substr($value[1],0,48)).'...</b></a> 
                    </h3>
                    </div>
                    </div>
                    
                        <div class="view2 view-first">
                            <img style="width:100%; height:110px;" src="web/images/noticias/'.$value[3].'" alt="" />
                            <div class="mask">
                            <p>'.utf8_encode(substr($value[2],0,95)).' ...</p>
                                <a href="#" class="info">LEER MAS</a>
                            </div>
                        </div>
                    
                </div>';

       } $con=$con+1;}  
echo '</div>';
   ?>  
            
<!--noticias-->


    </div>
    <div class="row">
        <div class="col-md-12" style="background-color: #fff; padding-right: 3px; margin-top: 8px;">
            <div class="col-md-8" style="padding-left: 0; height: 680px; margin-top: 8px; margin-bottom: 8px; ">
                <div class="col-md-12" style="background-color: #FFF; height: 510px;">
                    <?php
                       foreach ($data["rows4"] as $key => $value){
                    echo ' <div class="header_01">'.utf8_encode($value[1]).'</div>
                <p style="text-align: justify; font-family: Calibri; font-size: 13px;">'.utf8_encode($value[2]).'</p>
                <br><br><br><center><div class="section_01" style="background-color: #CFCFCF;">
                    <p style="text-align: center; font-style:italic;; font-size: 12px;">
                    <strong>Misión </strong><br>
                    
                    <br>
'.utf8_encode($value[3]).'
                    <BR><br>
                    <strong>Visión </strong><br><br>
                    '.utf8_encode($value[4]).'
                    </p>               
                </div></center>
                <ul class="list_with_icon">
                    <li style="font-family: Calibri; font-size:12px;">Integer tempor, libero quis laoreet dapibus, quam mauris hendrerit  urna, vel feugiat dolor lectus non velit. Fusce at nisl libero, ac  fringilla risus.</li>
                    <li style="font-family: Calibri; font-size:12px;">Proin non velit nec enim volutpat euismod. Phasellus lorem velit, porttitor non iaculis in, euismod a metus. Nullam orci odio, dignissim a egestas ac.</li>
              </ul>';
                        

                       }?>
               
            
                </div>
                
            </div>
           
            <div class="col-md-4" style="background-color: #E2E2E2; border: 1px solid #666666; padding-right: 0; padding-left: 0; height: 460px; margin-top: 8px; margin-bottom: 8px;">
                <div style="background: #75289A;
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b163c7', endColorstr='#7817b0', GradientType=0 ); height: 40px;">
                 <p style="font:1.48em calibri, Arial; color: #fff;"><strong>NOTICIAS Y EVENTOS</strong></p>   
                </div>
                <!--eventos-->
                <div style="height: 400px;width: 320px; overflow-y: auto; margin-top: 5px;">
                    
              
                    <?php
                        foreach ($data["rows2"] as $key => $value) 
                        {

                        ?>
                        <div class="news_section_2">
                        <div class="news_date_2">
                            <span><?php 
                            $fecha = new DateTime($value[3]);
                            echo $fecha->format("d");?></span> <br><br><span><?php  echo  strtoupper($fecha->format("M")); ?></span> 
                                                    </div>
                        <div class="news_content_2">
                            <div class="header_05_2"><a href="#"><?php echo utf8_encode($value[1]); ?></a></div>
                            <p style="font-size:12px; font-family: Calibri;"><?php echo utf8_encode(substr($value[2],0,100))."..."; ?></p>
                        </div>
                        
                        <div class="cleaner"></div>
                       
                        
                        </div>
                    <?php
                        };

                        ?>
                    
                    </div>
                 <!--eventos -->
                
                <div style=" width: 320px; height: 190px; margin-top: 30px; padding-left: 45px;">
                    <p style="font:1.48em calibri, Arial; color: #530D61; margin-right: 45px;"><strong>INTRANET</strong></p>
                   
              <?php if(!isset($_SESSION['user'])) { ?>
                    <form id="frmlogin" method="post"  action="web/process.php">
                        <?php if($_GET['error']) {echo "<div style='color:red; text-align:center;'>MSG: Al parecer olvido sus datos!</div>";} ?>
                    <div id="block">
                        <label id="user" for="name">p</label>
                        <input type="text"  class="text ui-widget-content ui-corner-all" name="usuario" size="10" id="usuario" title="usuario" onfocus="clearText(this)" onblur="clearText(this)" placeholder="Usuario" required/>
                        <label id="pass" for="password">k</label>
                        <input type="password"value="" class="text ui-widget-content ui-corner-all" name="clave" size="10" id="clave" title="clave" placeholder="Password" required />
                        <input type="submit" id="ingresar" value="a"/>
                    </div>
                    </form>
                     <?php }else{ ?>
                        <br><br>
                        <a class="btn btn-primary" href="web" >REGRESAR AL SISTEMA</a>
                     <?php } ?>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <p style="font:1.48em calibri, Arial; color: #530D61;"><strong>DESARROLLADORES DEL PROYECTO</strong></p>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="mosaicflow" data-item-height-calculation="attribute" >
    <?php 
 foreach ($data["rows5"] as $key => $value) {
    echo '<div class="mosaicflow__item" >
            <img width="100" height="150" src="'.$value[1].'"  alt="fotos">
            <p>'.$value[2].'</p>
        </div>';
 }
    ?>
        
    </div>
  </div>
</div>
    <div class="row" style="margin-top:15px;">
        
    </div>
        <div class="row">
    <div class="col-md-12" style="margin-top: 10px;">
    
    </div> 
    
    </div>
    
  </div>
