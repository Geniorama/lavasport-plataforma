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

  background-color: #fff;

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





.img1 {

  position: relative;

  left: 0;

  top: 0;

  width: 100%;

  height: 100%;

  border-radius: 4px;

  box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;

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

.contentdetalle {

  z-index: 800;

  background-color: #ecf0f5;

}

   </style>

 <!-- Content Wrapper. Contains page content -->

  <div class="contentdetalle">

    <!-- Content Header (Page header) -->





    <!-- Main content -->

    <section class="content">



   





      <!-- =========================================================== -->







           <!-- Small boxes (Stat box) -->

           <div class="row">

        <div class="col-xs-12">

          <!-- small box -->

		  <div class="box box-default">

        

        <!-- /.box-header -->


<div class="box">
            <div class="box-header">
              <h3 class="box-title"><strong>ORDEN  # </strong><?php echo $this->valor[0]; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
             
                <tr>
                  <td><strong>Nombre</strong></td>
                  <td> <?php echo $datos->fields["nombre"]." ".$sale->fields["apellido"]; ?></td>
                  
                
                </tr>
 <tr>
                  <td><strong>Grado</strong></td>
                  <td> <?php echo $datos->fields["grados_nombre"]; ?></td>
                  
                
                </tr>
                 <tr>
                  <td><strong>Compañia</strong></td>
                  <td>  <?php echo $datos->fields["companias_nombre"]; ?></td>
                  
                
                </tr>
                 <tr>
                  <td><strong>Telefono</strong></td>
                  <td> <?php echo $datos->fields["telefono"]; ?></td>
                  
                
                </tr>     
                 <tr>
                  <td><strong>Recibido Por</strong></td>
                  <td> <?php echo $datos->fields["recibidopor"]; ?></td>
                  
                
                </tr>       
                  <tr>
                  <td><strong>Fecha de Radicado</strong></td>
                  <td><?php echo date('d-M-Y',strtotime($datos->fields["fecha_radicado"])); ?></td>
                  
                
                </tr>   
                <tr>
                  <td><strong>Fecha Revisión</strong></td>
                  <td><?php echo $datos->fields["fecha_revision"]; ?></td>
                  
                
                </tr>      
                  <tr>
                  <td><strong>Fecha de Promesa</strong></td>
                  <td><?php echo date('d-M-Y',strtotime($datos->fields["fecha_promesa"]));   ?>
</td>
                  
                
                </tr>      
                      <tr>
                  <td><strong>Tipo de Órden</strong></td>
                  <td><?php

        if($datos->fields["tipo"]==2){

          $tipot="cupo";

        }else{

    

          $tipot="extra";

        }

      echo $tipot; ?>   
</td>
                  
                
                </tr>            
            
            
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
       





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

				<?php if($tipo==2){ ?>

				  <th>Peso Un.</th>

				  <th>Peso Tot.</th>

				<?php } ?>

				<?php if($tipo==1){ ?>

				  <th>Precio Un.</th>

				  <th>Precio Tot.</th>

				<?php } ?>

                  <th>Check</th>

                </tr>

			  <?php

			 $totalp=0; 

			 $totalpiezas=0;

			  while(!$sale->EOF){   ?>

				<tr>

        <td><?php echo $sale->fields["cantidad"]; ?></td>

        <td><?php echo $sale->fields["productos_nombre"]; ?> <?php echo $sale->fields["observacione_id"]; ?> 

        <?php if($sale->fields["editado"]){  ?><span title="<?php echo $datos->fields["comentario_edicion"];  ?>"  class="label label-danger">editado</span> <?php } ?>

      </td>

                  <td><?php echo $sale->fields["cant_prendas"]; ?></td>

				

				  <td><?php if($tipo==2){ echo round($sale->fields["precio"]); } if($tipo==1){ echo "$".number_format($sale->fields["precio"],0,',','.'); } ?></td>

				  <td><?php if($tipo==2){  echo round($sale->fields["precio"]*$sale->fields["cantidad"],2); } if($tipo==1){ echo "$". number_format($sale->fields["precio"]*$sale->fields["cantidad"],0,',','.'); }// echo number_format(round($sale->fields["precio"]*$sale->fields["cantidad"],2),',','.');  } ?></td>

			  <td> <input type="checkbox" disabled  name="<?php echo $sale->fields["id"];  ?>" id="<?php echo $sale->fields["id"];  ?>" value="1" <?php if($sale->fields["entregado"]==1){ ?> checked <?php } ?>></td>

                </tr>

			  <?php $totalpiezas=$totalpiezas+$sale->fields["cant_prendas"];  $totalp=$totalp+round($sale->fields["precio"]*$sale->fields["cantidad"],2); $sale->MoveNext(); } ?>



			  <tr>

                  <td><strong>Totales:</strong></td>

                  <td></td>

                  <td><strong><?php echo $totalpiezas; ?></strong></td>

				  <td></td>

				  <td><strong><?php  if($tipo==2){ echo round($totalp,2); echo " gramos";  }  if($tipo==1){ echo "$".number_format($totalp,0,',','.'); }?></strong></td>

                  <td></td>

                </tr>



<?php if($tipo==1){   ?>

  

          



          <tr>

                  <td><strong>descuento:</strong></td>

                  <td></td>

                  <td></td>

				  <td></td>

				  <td><strong><?php

					  if($datos->fields["descuento"]>0){

						  $descuentovalor=$datos->fields["descuento"]/100;

						  $descontado=$descuentovalor*$totalp;

					  echo "$".number_format($descontado,0,",","."); } ?></strong></td>

                  <td></td>

                </tr>









                <tr>

                  <td><strong>Pagado:</strong></td>

                  <td></td>

                  <td></td>

				  <td></td>

				  <td><strong><?php  echo "$".number_format($datos->fields["abono"]+$abonosp1,0,',','.'); ?></strong></td>

                  <td></td>

                </tr>





                <tr>

                  <td><strong>a Pagar:</strong></td>

                  <td></td>

                  <td></td>

				  <td></td>

				  <td><strong><?php  echo "$".number_format(($totalp-$descontado)-($datos->fields["abono"]+$abonosp1),0,',','.'); ?></strong></td>

                  <td><input type="hidden" name="apagar" id="apagar" value="<?php echo $totalp-$descontado-($datos->fields["abono"]+$abonosp1); ?>"></td>

                </tr>

<?php

if($totalp-$descontado-($datos->fields["abono"]+$abonosp1)>0){

?>



<tr>

                  <td><strong>abonar:</strong></td>

                  <td></td>

                  <td></td>

				  <td></td>

				  <td><input type="number" id="abono" name="abono" class="form-control"></td>

<td><button onclick="abonar()">Abonar</button></td>

                </tr>

<?php



}





} ?>







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

            <div class="col-md-6">

            <div class="form-group">

			

     <textarea name="comentario" readonly id="comentario" placeholder="Comentario" class="form-control" style="width: 100%;"><?php echo $datos->fields["comentario_cliente"];  ?></textarea>

     

     

     

              <!-- /.form-group -->

            </div>

</div>



            <div class="col-md-6">

            <div class="form-group">

            <div id="signature-pad" class="signature-pad">

    <div class="signature-pad--body">

      <img class="img1" onerror="this.onerror=null;this.src='<?php echo PATU ?>access/no-firma.jpg'" src="<?php echo PATO ?>firmas/firma-<?php echo $this->valor[0]; ?>.jpg"></canvas>

    </div>

    <div class="signature-pad--footer">

      <div class="description">Firma</div>



      <div class="signature-pad--actions">

      

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

			

            <h1>&nbsp;<span class="label label-default">Calificación: <div align="center" id="star2" class='starrr'></div></span></h1> 





         <!-- /.form-group -->

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

document.getElementById('star2').style.pointerEvents = 'none';



$('.starrr').starrr({

      max: 5,

    rating: <?php echo $datos->fields["calificacion"]; ?>,

      change: function(e, value){

       $("#calificacion").val(value).trigger('input');

      

      }

    });



function abonar(){

  if(parseInt($("#abono").val())<=parseInt($("#apagar").val())){

  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/abonarvalorpendiente/",data: "ordene_id=<?php echo $this->valor[0]; ?>&valor="+$("#abono").val(),





success: function(datos){





alert("abono exitoso");

window.location.reload();

}





});

}else{
  alert("El ABONO DEBE SER MENOR O IGUAL AL VALOR TOTAL");
       // $("#carga").hide();

}

}



    </script>

<script src="<?php echo PATU; ?>js/signature_pad.umd.js"></script>

<script src="<?php echo PATU; ?>js/app.js"></script>