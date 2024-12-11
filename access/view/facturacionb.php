 <style>
  input[type=checkbox] {

    transform: scale(2);

}
 </style>
 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Facturacion

        <small>Version 1.0</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Facturacion</li>

      </ol>

    </section>



    <!-- Main content -->

 <!-- Info boxes -->

 <section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">Facturación</h3>

			</div>

			

      <div class="box box-default">

        <div class="box-header with-border">

          <h3 class="box-title">Filtros</h3>



          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

          </div>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

        <form action="<?php echo PATO; ?>productocupos/facturacionfiltro/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



          <div class="row">

            <div class="col">

            <div class="form-group">

                

                <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                      <span>

                        <i class="fa fa-calendar"></i> Rango de fechas

                      </span>

                      <i class="fa fa-caret-down"></i>

                    </button>      </div>

             



          

              <!-- /.form-group -->

       

              <div class="form-group">

              <input type="hidden"  name="fecha1" <?php if(isset($_POST["fecha1"]) and $_POST["fecha1"]!=""){ ?> value="<?php echo $_POST["fecha1"]; ?>" <?php }?> id="fecha1">

                <input type="hidden"  name="fecha2" id="fecha2" <?php if(isset($_POST["fecha2"]) and $_POST["fecha2"]!=""){ ?> value="<?php echo $_POST["fecha2"]; ?>" <?php }?>>

              <button type="submit" class="btn btn-primary">Filtrar</button>

</div>

              <!-- /.form-group -->

            </div>

            <!-- /.col -->

          </div>

          <!-- /.row -->

        </div>

        <!-- /.box-body -->

        <div class="box-footer">

       

</form>

selecione los filtros y presione el boton para filtrar.

        </div>

      </div>


<?php if(isset($_POST["fecha1"])){ 

  ?>
    <div class="col-md-12">

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body" style="">

            <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>

          <th>Facturar</th>

          <th>Fecha Factura</th> 

          <th>Nit Cliente</th>

          <th>Nombre Cliente</th>
           <th>Valor Base</th>
            <th>Valor Iva</th>
            <th>% Iva</th>
            <th>Valor Total</th>
             <th>Tipo Factura</th>
              <th>Cod Cliente</th>

                </tr>

                </thead>

                <tbody>

				<?php


$z=92698;
	while(!$sale->EOF){ 
$valoriva=$sale->fields["valor"]*0.19;

    ?>

                <tr>

				  <td><input type="checkbox" value="1" name="check1"></td>

          <td><?php echo $sale->fields["fecha"]; ?></td>    
            <td><?php echo $sale->fields["documento"]; ?></td>    
              <td><?php echo $sale->fields["nombre"]; ?></td>    
                <td class="text-right"><?php echo number_format($sale->fields["valor"]-$valoriva,0,'.',','); ?></td>    
                  <td class="text-right"><?php echo number_format($valoriva,0,'.',','); ?></td>    
                    <td class="text-right">19%</td>    
                    <td class="text-right"><?php echo number_format($sale->fields["valor"],0,'.',','); ?></td>         

       <td><?php echo $sale->fields["tipo"]; ?></td>         
       <td><?php echo $sale->fields["id"]; ?></td>         
         
                </tr>

        <?php


     $sale->MoveNext(); }$sale->Move(0); ?>  

     

        

      </tbody>

     

                <tfoot>

                <tr>

            <th>Facturar</th>

          <th>Fecha Factura</th> 

          <th>Nit Cliente</th>

          <th>Nombre Cliente</th>
           <th>Valor Base</th>
            <th>Valor Iva</th>
            <th>% Iva</th>
            <th>Valor Total</th>
             <th>Tipo Factura</th>
              <th>Cod Cliente</th>
         

                </tr>

                </tfoot>

              </table>
 <div class="form-group">

              <button type="button" onclick="generarfacturas()" class="btn btn-primary">Facturar los seleccionados</button>

             
</div>
            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>     

        

   
<?php } ?>

                



          </div>



       

          <!-- /.box -->

        <!-- /.modal -->

		  <script>



function ver(id,tipo){

  $("#carga").show();

  $('.modal-body').load('<?php echo PATO; ?>productocupos/detalle/'+id+'/'+tipo,function(){

        $('#modal-default').modal({show:true});

        $("#carga").hide();

    });

}

  $(function () {







    $('.select2').select2();

    $('#example1').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : false,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  })



  

  $('#daterange-btn').daterangepicker(

      {

        ranges   : {

          'Hoy'       : [moment(), moment()],

          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

          'Ultimos 7 dias' : [moment().subtract(6, 'days'), moment()],

          'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],

          'Este mes'  : [moment().startOf('month'), moment().endOf('month')],

          'Mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

        },

       

        <?php if(isset($_POST["fecha1"]) and $_POST["fecha1"]!=""){ 

          

          $newDate = date("m/d/Y", strtotime($_POST["fecha1"]));

          $newDate2 = date("m/d/Y", strtotime($_POST["fecha2"]));

          ?>

           startDate: "<?php echo  $newDate; ?>",

    endDate: "<?php echo  $newDate2; ?>"

         

      <?php }else{

        echo " startDate: moment().subtract(29, 'days'),  endDate  : moment()";

      } ?>

        

       

      },

      function (start, end) { 

      

        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))

     

        $("#fecha1").val(start.format('YYYY-MM-DD'));

        $("#fecha2").val(end.format('YYYY-MM-DD'));

      }

    );

    <?php if(isset($_POST["fecha1"]) and $_POST["fecha1"]!=""){ ?>

    $('#daterange-btn span').html('<?php echo date('d-M-Y',strtotime($_POST["fecha1"])); ?> - <?php echo date('d-M-Y',strtotime($_POST["fecha2"])); ?>');

    <?php }else{ ?>

      $('#daterange-btn span').html('<span><i class="fa fa-calendar"></i> Rango de fechas</span>');

    <?php } ?> 

$("#totalrecibido").html("<strong>TOTAL RECIBIDO: $<?php echo number_format($totalabono+$totalvalor2+$totalvalor3+$totalvalor4+$totalvalor5,0,",","."); ?></strong>");

function verordenesvalores(user){

  $("#carga").show();







  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/ordenesvalores/",data: "admin_id="+user+"&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",





success: function(datos){



  $('#modal-default').modal({show:true});

        $("#carga").hide();



        $('.modal-body').html(datos);

}





});

















 }



 function vermarquillasvalores(user){



  $("#carga").show();







$.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/marquillasvalores/",data: "admin_id="+user+"&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",





success: function(datos){



$('#modal-default').modal({show:true});

      $("#carga").hide();



      $('.modal-body').html(datos);

}





});





 }



 function vermarquillasvalores2(user){



$("#carga").show();







$.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/marquillasvalores2/",data: "admin_id="+user+"&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",





success: function(datos){



$('#modal-default').modal({show:true});

    $("#carga").hide();



    $('.modal-body').html(datos);

}





});





}







 function vervalorescupos(user){

  $("#carga").show();







  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/cuposvalores/",data: "admin_id="+user+"&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",





success: function(datos){



  $('#modal-default').modal({show:true});

        $("#carga").hide();



        $('.modal-body').html(datos);

}





});

















 }



 function verabonospendiente(user){



  $("#carga").show();







$.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/abonosvalores/",data: "admin_id="+user+"&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",





success: function(datos){



$('#modal-default').modal({show:true});

      $("#carga").hide();



      $('.modal-body').html(datos);

}





});





 }





        function exportaraexcel() {



$("#datos_a_enviar").val($("<div>").append($("#example4").eq(0).clone()).html());

$("#FormularioExportacion").submit();



}

function exportaraexcel2() {



$("#datos_a_enviar2").val($("<div>").append($("#example7").eq(0).clone()).html());

$("#FormularioExportacion2").submit();



}

   

</script>





