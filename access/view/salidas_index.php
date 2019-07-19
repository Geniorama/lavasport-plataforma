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
          <div class="row">
            <div class="col-mb-12">
            <hr style="color: #0056b2;" />
          </div>
</div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-4">
            <div class="form-group">
			
     <textarea name="comentario" id="comentario" placeholder="Comentario" class="form-control" style="width: 100%;"></textarea>
     
     
     
              <!-- /.form-group -->
            </div>
</div>

            <div class="col-md-4">
            <div class="form-group">
			
      <textarea name="comentario" id="comentario" placeholder="Firma" class="form-control" style="width: 100%;"></textarea>
      
      
      
               <!-- /.form-group -->
             </div>
</div>
            <!-- /.col -->
            <div class="col-md-4">
            <div class="form-group">
			
            <div align="center" class='starrr'></div>
      
      
               <!-- /.form-group -->
             </div>
</div>
     
		

            <!-- /.col -->
          </div>
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
          <div class="box-header">
              <h3 class="box-title">Detalle</h3>

              <div class="box-tools">
                <div class="input-group input-group" style="width: 150px;">
                 
                  <div class="input-group-btn">
                    <button type="button" onclick="generarOrden()" class="btn btn-primary">RECIBÍ A CONFORMIDAD LAS PRENDAS SELECCIONADAS:</button>
                  </div>
                </div>
              </div>
            </div>
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
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>

$('.starrr').starrr();

document.onkeyup = function(e) {

  if (e.ctrlKey && e.which == 66) {
    //alert("Ctrl + B shortcut combination was pressed");
    generarOrden();
  }
  
};


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


$.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/verprodorden/"+$("#orden").val(),data: "ok=1",


success: function(datos){


$("#datatable1").html(datos);
}


});








$("#carga").hide();
}


});




	  }

   


   





 
	  </script>