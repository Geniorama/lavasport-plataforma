

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

       Ventas adicionales

        <small>Ventas</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Entrada Adicionales</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



   





      <!-- =========================================================== -->







           <!-- Small boxes (Stat box) -->

           <div class="row">

        <div class="col-lg-12 col-xs-6">

          <!-- small box -->

		  <div class="box box-default">

        

        <!-- /.box-header -->

       

        <div class="box-body">

          <div class="row">

            <div class="col-md-2">

              <div class="form-group">

              

                <input type="number" autofocus id="documento" name="documento" onchange="traercliente()" class="form-control" style="width: 100%;" placeholder="Doc. Cliente">

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

          <div class="col-md-2">

              <div class="form-group">

              <select name="categoria" id="categoria" onchange="limpiar()" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Producto"); ?>" >

		<option value="0"><?php echo __("Marquillas"); ?></option>

		<option value="1"><?php echo __("Tulas"); ?></option>

		<option value="2"><?php echo __("Mallas"); ?></option>



				</select>        </div>

              <!-- /.form-group -->

			

     

     

     

     

              <!-- /.form-group -->

            </div>



          

            <div class="col-md-2">

              <div class="form-group">

              <input type="number" id="cantidad" onchange="calcularprecio()" required  name="cantidad" class="form-control" style="width: 100%;" placeholder="cantidad">

          </div>

              <!-- /.form-group -->

			

     

     

     

     

              <!-- /.form-group -->

            </div>



      

<div class="col-md-2">

            <div class="form-group">

           <input type="text" id="precio" name="precio" onkeypress="verenter1(event)" class="form-control" style="width: 100%;" placeholder="Precio">

  </div>

</div>

         

      <div class="col-md-2">

      <div class="form-group">

      <button onclick="agregarProducto()" id="botonenvio" class="btn btn-primary">add</button>

      <input type="hidden" name="cliente_id" id="cliente_id">

    



    

      </div>

</div>

     

               </div>

<div class="row">



<div class="col-md-3">

      <div class="form-group" id="clienteesp" style="display:none">

      <strong style="font-size: 22px;color:red">CLIENTE ESPECIAL!!</strong>

      </div>

</div>

		

    

               </div>

            <!-- /.col -->

            

          </div>

          <!-- /.row -->







        </div>

        <!-- /.box-body -->

        

      </div>

      <!-- /.box -->

     

       

     

        <!-- ./col -->

      </div>

      <!-- /.row -->













      <!-- =========================================================== -->



    

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->



    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->



  <script>













  

	  function traercliente(){

      $("#carga").show();

      $("#clienteesp").hide();

    $("#cantidad").focus();

		$.ajax({type: "POST",url: "<?php echo PATO; ?>clientes/ver/"+$("#documento").val(),data: "ok=1",





success: function(datos){





arr=datos.split('/');

if(arr[0]!=" "){

$("#nombrehtml").html(arr[0]);

$("#gradohtml").html("<strong>Grado: </strong>"+arr[1]);

$("#companiahtml").html("<strong>Comp: </strong>"+arr[2]);

$("#emailhtml").html("<strong>Email: </strong>"+arr[3]);

$("#telefonohtml").html("<strong>tel: </strong>"+arr[4]);

$("#cliente_id").val(arr[5]);

if(arr[6]==1){

$("#clienteesp").show();

}

$("#carga").hide();







}else{

  alert("DOCUMENTO INCORRECTO, VUELVA A INTENTARLO");

  $("#documento").val('');

  $("#documento").focus();

  $("#carga").hide();



}







}





});





	  }



   





    function agregarProducto(){



  if( $("#cantidad").val()!=""){



        $("#botonenvio").hide();

  

 

    //  $("#carga").show();

      $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/agregar_marquilla/",data: "categoria="+$("#categoria").val()+"&cliente_id="+$("#cliente_id").val()+"&cantidad="+$("#cantidad").val()+"&precio="+$("#precio").val(),





success: function(datos){



  if($("#categoria").val()>0){





    window.open("<?php echo PATO; ?>productocupos/impresioncompra/"+datos, "Impresion", "width=10, height=10")







  }

 

  $("#cantidad").val('');

  $("#precio").val('');



 // $("#producto_id").select2().trigger('change');

  $("#cantidad").focus();

alert("agregadas con exito");

$("#botonenvio").show();

}





});



}else{



 alert("CANTIDAD VACIA."); 

}



    }

    function calcularprecio(){



      if($("#categoria").val()==0){

if( parseInt($("#cantidad").val())<15){



  $("#precio").val(parseInt($("#cantidad").val())*1000);

}else{

 precio=(parseInt($("#cantidad").val())-15)*1000;

 $("#precio").val(10000+parseInt(precio));



}



}



if($("#categoria").val()==1){



  $("#precio").val(parseInt($("#cantidad").val())*10000);





}

if($("#categoria").val()==2){



$("#precio").val(parseInt($("#cantidad").val())*9500);





}





    }



  



function limpiar(){

  $("#cantidad").val("");

  $("#precio").val("");

}



    



 



function verenter(e){

  tecla = (document.all) ? e.keyCode : e.which;

  if (tecla==13) document.getElementById('botonenvio').focus();



}

function verenter1(e){

  tecla = (document.all) ? e.keyCode : e.which;

  if (tecla==13) document.getElementById('comentario').focus();



}

 

	  </script>