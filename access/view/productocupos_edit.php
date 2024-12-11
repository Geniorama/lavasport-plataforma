  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

       Modificar Órden

        <small>Cupo</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Modificar Órden</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



   





      <!-- =========================================================== -->







           <!-- Small boxes (Stat box) -->

           <div class="row">

        <div class="col-lg-9 col-xs-6">

          <!-- small box -->

		  <div class="box box-default">

        

        <!-- /.box-header -->

       

        <div class="box-body">

          <div class="row">

            <div class="col-md-2">

              <div class="form-group">

              

                <input type="number" autofocus id="orden_id" name="orden_id" onchange="traerorden()" class="form-control" style="width: 100%;" placeholder="Orden #">

              <input type="hidden" id="documento" name="documento">     

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

              <input type="number" id="cantidad" onchange="document.getElementById('codprod').focus()" required  name="cantidad" class="form-control" style="width: 100%;" placeholder="Cantidad">

          </div>

              <!-- /.form-group -->

			

     

     

     

     

              <!-- /.form-group -->

            </div>



            <div class="col-md-2">

            <div class="form-group">

            <input type="number" id="codprod"  onchange="verproducto()"  name="codprod" class="form-control" style="width: 100%;" placeholder="Cod.Prod">

    

		 

      </div>

</div>

            <!-- /.col -->

            <div class="col-md-6">

            

              <!-- /.form-group -->

              <div class="form-group">

              <input type="text" id="comentario" onkeyup="vercomentario()" onkeypress="verenter(event)" name="comentario" class="form-control" style="width: 100%;" placeholder="Cod.coment">

        

           

			  </div>

			 

              <!-- /.form-group -->

       

     

      </div>

      <div class="col-md-2">

      <div class="form-group">

      <button onclick="agregarProducto()" style="display:none" id="botonenvio" class="btn btn-primary">add</button>

      <input type="hidden" name="cliente_id" id="cliente_id">

      <input type="hidden" name="peso" id="peso">

      <input type="hidden" name="fecha_promesa" id="fecha_promesa" value="">

      </div>

</div>

     

               </div>

<div class="row">

<div class="col-md-5">

      <div class="form-group" id="productohtml">

       

              </div>

</div>

<div class="col-md-2">

      <div class="form-group" id="clienteesp" style="display:none">

      <strong style="font-size: 22px;color:red">CLIENTE ESPECIAL!!</strong>

      </div>

</div>

<div class="col-md-5">

     

      <textarea id="comentario_edicion" name="comentario_edicion" class="form-control"></textarea><button onclick="guardarcomentario()" class="btn-success">Guardar Comentario<i class="fa fa-save"></i></button>

 

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

        <div class="col-lg-3 col-xs-6" id="cupodelcliente">



     

        </div>

        <!-- ./col -->

      </div>

      <!-- /.row -->













      <!-- =========================================================== -->



      <div class="row">

        <div class="col-xs-12">

          <div class="box">

          <div class="box-header">

              <h3 class="box-title">Detalle de la Órden</h3>



              <div class="box-tools">

                <div class="input-group input-group" style="width: 150px;">

                 

               

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

                  <th>Quitar</th>

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



$('[data-toggle="push-menu"]').pushMenu('toggle');

document.body.style.zoom = "90%"; 







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



     

	  function traerorden(){

      $("#carga").show();

      $("#clienteesp").hide();

    $("#cantidad").focus();



  

    $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/verorden/"+$("#orden_id").val(),data: "ok=1",





success: function(datos){



  $("#documento").val(datos);













  $.ajax({type: "POST",url: "<?php echo PATO; ?>clientes/ver/"+$("#documento").val(),data: "ok=1",





success: function(datos){





arr=datos.split('/');

if(arr[0]!=" "){

$("#nombrehtml").html(arr[0]);

$("#gradohtml").html("<strong>Grado: </strong>"+arr[1]);

$("#companiahtml").html("<strong>Comp: </strong>"+arr[2]);

$("#emailhtml").html("<strong>Email: </strong>"+arr[3]);

$("#telefonohtml").html("<strong>Tel: </strong>"+arr[4]);

$("#cliente_id").val(arr[5]);

$.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/traerprodcliente/"+arr[5],data: "ok=1",





success: function(datos){



$("#productohtml").html(datos);

verproductos1();

$("#carga").hide();



}





});







if(arr[6]==1){

$("#clienteesp").show();

}

$.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/estadocupo/"+arr[5],data: "ok=1",





success: function(datos){



$("#cupodelcliente").html(datos);





}





});





}else{

  alert("DOCUMENTO INCORRECTO, VUELVA A INTENTARLO");

  $("#documento").val('');

  $("#documento").focus();

  $("#carga").hide();



}







}





});























}





});













    





	  }



   





    function agregarProducto(){



  if($("#codprod").val()!="" &&  $("#cantidad").val()!=""){



        $("#botonenvio").hide();

    producto =$("#codprod").val();

 

    //  $("#carga").show();

      $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/agregar_producto_edit/",data: "ordene_id="+$("#orden_id").val()+"&cupo="+$("#cupo").val()+"&cliente_id="+$("#cliente_id").val()+"&producto_id="+producto+"&cantidad="+$("#cantidad").val()+"&precio="+$("#peso").val()+"&observacione_id="+$("#comentario").val(),





success: function(datos){

  $("#producto_id").val('');

  $("#codprod").val('');

  $("#cantidad").val('');

  $("#peso").val('');

  $("#comentario").val('');

 // $("#producto_id").select2().trigger('change');

  $("#cantidad").focus();

$("#datatable1").html(datos);



$("#botonenvio").show();

}





});



}else{



 alert("CANTIDAD O CODIGO VACIO, VERIFIQUE."); 

}



    }



  function  verproductos1(){





      $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/vertabla/"+$("#orden_id").val(),data: "ok=1",





success: function(datos){



  $("#cantidad").focus();

$("#datatable1").html(datos);



}





});



    }



    function verPeso(){

      //$("#carga").show();

      $.ajax({type: "POST",url: "<?php echo PATO; ?>productos/verpeso/"+$("#producto_id").val(),data: "ok=1",





success: function(datos){



$("#peso").val(datos);



$("#carga").hide();

}





});





    }





function ponercodigo(){



$("#codprod").val($("#producto_id").val());

arr = $("#producto_id option:selected").text().split("-");

peso=arr[2].replace("gr.", "");

$("#peso").val(peso);

//$("#botonenvio").focus();

}



    function verproducto(){

     

    //  $("#carga").show();

    $("#comentario").focus();

    $("#producto_id").val($("#codprod").val());

$("#producto_id").select2().trigger('change');

//$("#peso1").html(arr[1]+" gramos");



arr = $("#producto_id option:selected").text().split("-");

peso=arr[2].replace("gr.", "");

$("#peso").val(peso);



    }



  







function editarcoment(id){

  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/editarcomentario/"+id,data: "observacione_id="+$("#comment"+id).val(),





success: function(datos){



alert("editado con exito");

//window.location.reload();



}





});



}

function editarcantidad(id){

  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/editarcomentario/"+id,data: "cantidad="+$("#cantidad"+id).val(),





success: function(datos){



alert("editado con exito");

//window.location.reload();



}





});



}

function borrarregistro(id){

  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/agregar_producto_edit/"+id,data: "ordene_id="+$("#orden_id").val(),





success: function(datos){



  $("#datatable1").html(datos);

}





});

}



function verenter(e){

  tecla = (document.all) ? e.keyCode : e.which;

  if (tecla==13) document.getElementById('botonenvio').focus();



}

function guardarcomentario(){



  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/actualizarcomentarioedit/"+$("#orden_id").val(),data: "comentario_edicion="+$("#comentario_edicion").val(),





success: function(datos){

alert("comentario guardado");

//$("#cupodelcliente").html(datos);





}





});

}

 

	  </script>