 <style>
   .signature-pad {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  font-size: 10px;
  width: 100%;
  height: 100%;
  max-width: 700px;
  max-height: 460px;
  border: 1px solid #e8e8e8;
  background-color: #3c8dbc;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
  border-radius: 4px;
  padding: 16px;
}

.signature-pad::before,
.signature-pad::after {
  position: absolute;
  z-index: -1;
  content: "";
  width: 40%;
  height: 10px;
  bottom: 10px;
  background: transparent;
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
}

.signature-pad::before {
  left: 20px;
  -webkit-transform: skew(-3deg) rotate(-3deg);
          transform: skew(-3deg) rotate(-3deg);
}

.signature-pad::after {
  right: 20px;
  -webkit-transform: skew(3deg) rotate(3deg);
          transform: skew(3deg) rotate(3deg);
}

.signature-pad--body {
  position: relative;
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  border: 1px solid #f4f4f4;
}

.signature-pad--body
canvas {
  position: relative;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  border-radius: 4px;
  box-shadow: 0 0 5px #000 inset;
}

.signature-pad--footer {
  color: #C3C3C3;
  text-align: center;
  font-size: 1.2em;
  margin-top: 8px;
}

.signature-pad--actions {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin-top: 8px;
}
input[type=checkbox] {
    transform: scale(2);
}
   </style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Salidas
        <small>Salida de Prendas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Salidas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

   


      <!-- =========================================================== -->



           <!-- Small boxes (Stat box) -->
           <div class="row">
        <div class="col-xs-12">
          <!-- small box -->
		  <div class="box box-default">
        
        <!-- /.box-header -->
       
        <div class="box-body">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
              
                <input type="number" autofocus id="orden" name="orden" onchange="traercliente()" class="form-control" style="width: 100%;" placeholder="Orden Numero">
                     </div>
              <!-- /.form-group -->
			
     
     
     
     
              <!-- /.form-group -->
            </div>

            <div class="col-md-2">
            <div id="nombrehtml">
			  
		 
      </div>
</div>
            <!-- /.col -->
            <div class="col-md-2">
            
              <!-- /.form-group -->
              <div id="gradohtml">
			  
		 
        </div>
			 
              <!-- /.form-group -->
       
     
      </div>
      <div class="col-md-2">
      <div id="companiahtml">
			  
		 
        </div>
</div>
			<div class="col-md-2">
      <div id="emailhtml">
			  
		 
        </div>
			<!-- /.form-group -->
		
		
      
		
     
			<!-- /.form-group -->
      </div>
      <div class="col-md-2">
      <div id="telefonohtml">
			  
		 
        </div>
</div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-3">
            <div id="recibidopor">
			  
		 
        </div>
              <!-- /.form-group -->
			
     
     
     
     
              <!-- /.form-group -->
            </div>

            <div class="col-md-3">
            <div id="fecharadicado">
			  
		 
      </div>
</div>
            <!-- /.col -->
            <div class="col-md-3">
            
              <!-- /.form-group -->
              <div id="fechapromesa">
			  
		 
        </div>
			 
              <!-- /.form-group -->
       
     
      </div>
      <div class="col-md-3">
      <div id="tipoorden">
			  
		 
        </div>
</div>
		

            <!-- /.col -->
          </div>
     
          <!-- /.row -->
 
          <!-- /.row -->

            <!-- /.col -->
            
          </div>
          <!-- /.row -->



        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
     
       
       
      
      </div>
      <!-- /.row -->






      <!-- =========================================================== -->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="datatable1">
            <table class="table table-hover">
                <tr>
                  <th>Cantidad</th>
                  <th>Detalle</th>
                  <th>Piezas</th>
                  <th>Peso Un.</th>
                  <th>Peso Tot.</th>
                  <th>check</th>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>



     <!-- Small boxes (Stat box) -->
           <div class="row">
        <div class="col-xs-12">
          <!-- small box -->
		  <div class="box box-default">
        
        <!-- /.box-header -->
       
        <div class="box-body">
         
          <!-- /.row -->
      
        
          <!-- /.row -->
          <div class="row">
          <!--  <div class="col-md-6">
            <div class="form-group">
			
     <textarea name="comentario" id="comentario" placeholder="Comentario" class="form-control" style="width: 100%;"></textarea>
     
     
     
            
            </div>
</div> -->

            <div class="col-md-12">
            <div class="form-group">
            <div id="signature-pad" class="signature-pad">
    <div class="signature-pad--body">
      <canvas></canvas>
    </div>
    <div class="signature-pad--footer">
      <div class="description">Firma</div>

      <div class="signature-pad--actions">
        <div>
          <button type="button" class="button clear" data-action="clear">Limpiar</button>
          <button type="button" class="button" data-action="change-color">Cambiar color</button>
          <button type="button" class="button" data-action="undo">Volver</button>

        </div>
       
      </div>
    </div>
  </div>
      
               <!-- /.form-group -->
             </div>
</div>
            <!-- /.col -->
            
		

            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-mb-6">
            <div class="form-group">
			
            <h1>&nbsp;<span class="label label-default">Calificación: <div align="center" class='starrr'></div></span></h1> 


         <!-- /.form-group -->
       </div>
          </div>
          <div class="col-mb-6">
             <div class="form-group">
             &nbsp; <button type="button" id="salida1" onclick="salida()" class="btn btn-primary">RECIBÍ A CONFORMIDAD LAS PRENDAS SELECCIONADAS</button>
               
            </div>
             </div>
             
             <input type="hidden" name="comentario" value="" id="comentario">
             <input type="hidden" name="calificacion" value="1" id="calificacion">
</form> 
</div>
            <!-- /.col -->
            
          </div>
          <!-- /.row -->



        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
     
       
       
      
      </div>
      <!-- /.row -->




        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>



  function cambiarchecks(){
  
    if ($("#call2").is(':checked')) {
        //$("input[type=checkbox]").prop('checked', true); //todos los check
        $("#c11 input[type=checkbox]").prop('checked', true); //solo los del objeto #diasHabilitados
    } else {
        //$("input[type=checkbox]").prop('checked', false);//todos los check
        $("#c11 input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
    }
  }


$('.starrr').starrr({
      max: 5,
    //  rating: 3,
      change: function(e, value){
       $("#calificacion").val(value).trigger('input');
      
      }
    });


function vercomentario(){

if($("#comentario").val().length>1 && $("#comentario").val().length<3){
      $.ajax({type: "POST",url: "<?php echo PATO; ?>observaciones/verporcode/"+$("#comentario").val(),data: "ok=1",


success: function(datos){
if(datos!=""){
  $("#comentario").val(datos);
}
//$("#carga").hide();
}


});

}

    }

     $('.select2').select2();
	  function traercliente(){
      $("#carga").show();
		$.ajax({type: "POST",url: "<?php echo PATO; ?>clientes/verpororden/"+$("#orden").val(),data: "ok=1",


success: function(datos){


arr=datos.split('/');
$("#nombrehtml").html(arr[0]);
$("#gradohtml").html("<strong>Grado: </strong>"+arr[1]);
$("#companiahtml").html("<strong>Comp: </strong>"+arr[2]);
$("#emailhtml").html("<strong>Email: </strong>"+arr[3]);
$("#telefonohtml").html("<strong>tel: </strong>"+arr[4]);
$("#cliente_id").val(arr[5]);
$("#fecharadicado").html("<strong>Fecha Radicado: </strong>"+arr[6]);
$("#fechapromesa").html("<strong>Fecha Promesa:</strong>"+arr[7]);
$("#recibidopor").html("<strong>Recibido Por: </strong>"+arr[8]);
$("#estado").html(arr[9]);
$("#tipoorden").html("<strong>Tipo de Orden: </strong>"+arr[10]);

if(arr[10]=='cupo'){
tipo=2;

}else{
tipo=1;

}
if(arr[11]>0){
descuento=arr[11];
}else{

  descuento=0;
}
$.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/verprodorden/"+$("#orden").val(),data: "descuento="+descuento+"&tipo="+tipo,


success: function(datos){


$("#datatable1").html(datos);
}


});








$("#carga").hide();
}


});




	  }

   
    function abonar(){
  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/abonarvalorpendiente/",data: "ordene_id="+$("#orden").val()+"&valor="+$("#abono").val(),


success: function(datos){


alert("abono exitoso");
window.location.reload();
}


});

}

   



function salida(){
  $("#carga").show();




  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/salida/"+$("#orden").val(),data: $("#datos11").serialize()+"&comentario="+$("#comentario").val()+"&calificacion="+$("#calificacion").val(),


success: function(datos){
 guardar();
$("#carga").hide();


}


});

}

 
    </script>
<script src="<?php echo PATU; ?>js/signature_pad.umd.js"></script>
<script src="<?php echo PATU; ?>js/app.js"></script>