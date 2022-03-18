<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if(!function_exists('generarHTMLPdfInspeccion'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
 function generarHTMLPdfInspeccion($datos , $bImprimirAuto = 'N')
 {
   
    $content ='<!doctype html>';
    $content .='<html>';//inicio
    $content .='<head>';//inicio head
    $content .='<title>PDF Plantilla </title>';

    if($bImprimirAuto!='N'):
      $content .='<script type="text/javascript">
            function imprimir() {
                if (window.print) {
                    window.print();
                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }
        </script>';
      //$fontsize = '0.85rem';
      $page = ' ';
      
    else:
      //$fontsize = '0.85rem';
      $page = '';
      //$margin = 'margin-left: 12px;';
    endif;

    $content .='<style>
                @page { '.$page.'
                  @footnote {
                    display: none;
                  }

                  @bottom-left {
                    display: none;
                  }
                  @bottom-right {
                    display: none;
                  }
                }

                body{
                  font-size: 11px;
                  font-family: Arial,sans-serif;
                  margin:0px;
                  margin-left: 12px;
                  }

                .encabezado1{
                  border-bottom: 1px dotted gray;
                  padding-bottom: 5px;
                  padding-top: 5px;
                  font-weight: bold;
                }
                .border_bottom{
                  border-bottom:1px solid #CACACA;
                  border-left:1px solid #CACACA;
                }

                .col-1{
                  padding-top: 10px;
                  padding-bottom:10px;
                  height: 11px;
                  -ms-flex: 0 0 8%;
                  flex: 0 0 8%;
                  width: 8%;
                }

                .col-2{
                  padding-top: 10px;
                  padding-bottom:10px;
                  height: 11px;
                  -ms-flex: 0 0 17%;
                  flex: 0 0 17%;
                  width: 17%;
                }

                .col-4{
                  padding-top: 10px;
                  padding-bottom:10px;
                  height: 11px;
                  -ms-flex: 0 0 33%;
                  flex: 0 0 33%;
                  width: 33%;
                }
                .col-10{
                  padding-top: 10px;
                  padding-bottom:10px;
                  height: 11px;
                  -ms-flex: 0 0 83%;
                  flex: 0 0 83%;
                  width: 83%;
                }

                table{
                  width:100%;
                  border:1px;
                }
                .chbox{
                  margin:0px;
                  padding:0px;
                  margin-top:-5px;
                }
                .dividir{
                  border-bottom:1px solid #000000;
                }
                



                 

                </style>';
    $content .='</head>';//fin head

    if($bImprimirAuto!='N')
      $content .='<body onload="imprimir();">';//inicio body
      //$content .='<body>';//inicio body
    else
      $content .='<body>';//inicio body

    $content .='
      <span></span><br>
      <div class="" style="text-align:center; font-weight: bold;">REGISTRO DE INSPECCION</div><br>
      <div class="">
        <div class="row encabezado1"> INFORMACION PRODUCTOR </div>

       <table>
       <tr>
                <td class="col-2"><label>Codigo de Productor</label></td> 
                <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['codigo_productor'].'</td> 
                <td class="col-2"><label>DNI</label></td> 
                <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['nro_documento'].'</td> 
       </tr>
       <tr>
              <td class="col-2"><label>Nombre / Razon Social</label></td> 
              <td class="col-10 border_bottom" colspan="3">'.$datos['aDatoGeneral'][0]['nombre_razon'].'</td> 
       </tr>
       </table>

       <div class="row encabezado1"> INFORMACION FINCA </div>

       <table>
       <tr>
              <td class="col-2"><label>Nombre</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['nombre'].'</td> 
              <td class="col-2"><label>Departamento</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['departamento'].'</td> 
       </tr>
       <tr>
              <td class="col-2"><label>Provincia</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['provincia'].'</td> 
              <td class="col-2"><label>Distrito</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['distrito'].'</td> 
       </tr>
       <tr>
              <td class="col-2"><label>Zona</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['zona'].'</td> 
              <td class="col-2"><label>Altitud</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['altitud'].'</td> 
       </tr>
       <tr>
              <td class="col-2"><label>Latitud</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['latitud_gmd'].'</td> 
              <td class="col-2"><label>Longitud</label></td> 
              <td class="col-4 border_bottom">'.$datos['aDatoGeneral'][0]['longitud_gmd'].'</td> 
       </tr>
       </table>

       <div class="row encabezado1"> INFORMACION INSPECTOR </div>

       <table>
       <tr>
              <td class="col-2"><label>Inspector Interno</label></td> 
              <td class="col-4 border_bottom"> </td> 
              <td class="col-2"><label>Fecha Inspeccion</label></td> 
              <td class="col-4 border_bottom"> </td> 
       </tr>
       </table>

       <div class="row encabezado1"> II. ESTANDARES A CUMPLIR - ORGANICOS, SOCIALES Y SOSTENIBLES </div>

       <table>
       <tr>
              <td><input type="checkbox" ><label> NOP   </label></td> 
              <td><input type="checkbox" ><label> CEE #834/07 889/08   </label></td> 
              <td><input type="checkbox" ><label> JAS Notific.# 1605   </label></td> 
              <td><input type="checkbox" ><label> Perú DS # 004/2006   </label></td> 
       </tr>
       <tr>
              <td><input type="checkbox" ><label> Bio Suisse   </label></td> 
              <td><input type="checkbox" ><label> RAS   </label></td> 
              <td><input type="checkbox" ><label> UTZ   </label></td> 
              <td><input type="checkbox" ><label> Fairtrade   </label></td> 
       </tr>
       <tr>
              <td><input type="checkbox" ><label> C.A.F.E. Practices   </label></td> 
              <td><input type="checkbox" ><label> Naturland   </label></td> 
              <td><input type="checkbox" ><label>    </label></td> 
              <td><input type="checkbox" ><label>    </label></td> 
       </tr>
       </table>

       <div class="row encabezado1"> III. DATOS DE LA(S) PARCELA(S) DE CAFE </div>

       <table>
       <tr>
              <td>Lotes</td> 
              <td>Variedad de Cafe</td> 
              <td>Meses de Cosecha</td> 
              <td>Año y Mes de siembra</td>
              <td>Edad</td> 
              <td>Area Total</td> 
              <td>Cosecha Pergamino (Año Pasado)</td> 
              <td>Estimado pergamino (Año Actual)</td> 
       </tr>
       <tr>
              <td>1</td> 
              <td>
                <div class="chbox"><input type="checkbox" ><label> CATIMOR   </label></div>
                <div class="chbox"><input type="checkbox" ><label> CATURRA   </label></div>
                <div class="chbox"><input type="checkbox" ><label> PACHE   </label></div>
                <div class="chbox"><input type="checkbox" ><label> CATUAI   </label></div>
                <div class="chbox"><input type="checkbox" ><label> BORBON   </label></div>
                <div class="chbox"><input type="checkbox" ><label> TIPICA   </label></div>
                <div class="chbox"><input type="checkbox" ><label> CASTILLA   </label></div>
                <div class="chbox"><input type="checkbox" ><label> COSTA RICA   </label></div>
                <div class="chbox"><input type="checkbox" ><label> GRAN COLOMBIA   </label></div>
                <div class="chbox"><input type="checkbox" ><label> GEYSHA   </label></div>
                <div class="chbox"><input type="checkbox" ><label> LIMANI   </label></div>
              </td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
       </tr>
       <tr>
              <td>2</td> 
              <td>
                <div><input type="checkbox" ><label> CATIMOR   </label></div>
                <div><input type="checkbox" ><label> CATURRA   </label></div>
                <div><input type="checkbox" ><label> PACHE   </label></div>
                <div><input type="checkbox" ><label> CATUAI   </label></div>
                <div><input type="checkbox" ><label> BORBON   </label></div>
                <div><input type="checkbox" ><label> TIPICA   </label></div>
                <div><input type="checkbox" ><label> CASTILLA   </label></div>
                <div><input type="checkbox" ><label> COSTA RICA   </label></div>
                <div><input type="checkbox" ><label> GRAN COLOMBIA   </label></div>
                <div><input type="checkbox" ><label> GEYSHA   </label></div>
                <div><input type="checkbox" ><label> LIMANI   </label></div>
              </td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td>  
       </tr>
       <tr>
              <td>3</td> 
              <td>
                <div><input type="checkbox" ><label> CATIMOR   </label></div>
                <div><input type="checkbox" ><label> CATURRA   </label></div>
                <div><input type="checkbox" ><label> PACHE   </label></div>
                <div><input type="checkbox" ><label> CATUAI   </label></div>
                <div><input type="checkbox" ><label> BORBON   </label></div>
                <div><input type="checkbox" ><label> TIPICA   </label></div>
                <div><input type="checkbox" ><label> CASTILLA   </label></div>
                <div><input type="checkbox" ><label> COSTA RICA   </label></div>
                <div><input type="checkbox" ><label> GRAN COLOMBIA   </label></div>
                <div><input type="checkbox" ><label> GEYSHA   </label></div>
                <div><input type="checkbox" ><label> LIMANI   </label></div>
              </td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td>  
       </tr>
       </table>

       <div class="row encabezado1"> IV. VERIFICACION DE CONFORMIDAD CON LAS NORMAS </div>

       <table >
       <tr>
              <td class="col-4 border_bottom">Acción a verificar</td> 
              <td class="col-4 border_bottom" colspan="4">Cumplimiento</td> 
              <td class="col-4 border_bottom">Observaciones</td>
       </tr>
       <tr>
              <td class="col-4"> </td> 
              <td class="border_bottom">Critico para</td> 
              <td class="border_bottom">No Aplica</td> 
              <td class="border_bottom">SI</td> 
              <td class="border_bottom">NO</td> 
              <td class="col-4"> </td>
       </tr>
       <tr>
              <td colspan="6" class="encabezado1"> SISTEMA DE GESTIÓN DOCUMENTADO </td> 
       </tr>
       ';
        $i = 0;
        foreach ($datos['aCuestionario1'] as $key => $row) {
          $i++;
          $content.='<tr>
              <td class="col-4">'.$i.'.'.$row['descripcion'].'</td> 
              <td>TODOS</td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td class="border_bottom"></td>
          </tr>';
        }
       
       $content.='
       <tr>
              <td colspan="6" class="encabezado1"> BIENESTAR SOCIAL Y LABORAL </td> 
       </tr>
       ';
        
        foreach ($datos['aCuestionario2'] as $key => $row) {
          $i++;
          $content.='<tr>
              <td class="col-4">'.$i.'.'.$row['descripcion'].'</td> 
              <td>TODOS</td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td class="border_bottom"></td>
          </tr>';
        }

        $content.='
       <tr>
              <td colspan="6" class="encabezado1"> CONSERVACIÓN DE ECOSISTEMAS, AGUA, SUELOS Y VIDA SILVESTRE </td> 
       </tr>
       ';
        
        foreach ($datos['aCuestionario3'] as $key => $row) {
          $i++;
          $content.='<tr>
              <td class="col-4">'.$i.'.'.$row['descripcion'].'</td> 
              <td>TODOS</td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td class="border_bottom"></td>
          </tr>';
        }

        $content.='
       <tr>
              <td colspan="6" class="encabezado1"> MANEJO INTEGRADO DE CULTIVO Y RESIDUOS </td> 
       </tr>
       ';
        
        foreach ($datos['aCuestionario4'] as $key => $row) {
          $i++;
          $content.='<tr>
              <td class="col-4">'.$i.'.'.$row['descripcion'].'</td> 
              <td>TODOS</td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td><input type="radio" name=""/></td> 
              <td class="border_bottom"></td>
          </tr>';
        }

       
       $content.='
       </table>

       <div class="row encabezado1"> V. RESÚMEN DE NO CONFORMIDADES Y ACCIONES PROPUESTAS POR EL PRODUCTOR </div>

       <table>
       <tr>
              <td class="col-2 border_bottom">N° DE ITEM</td> 
              <td class="border_bottom col-10">MANIFIESTO DEL PRODUCTOR</td> 
       </tr>
       <tr>
              <td class="col-2 border_bottom">1</td> 
              <td class="border_bottom col-10"></td> 
       </tr>
       <tr>
              <td class="col-2 border_bottom">2</td> 
              <td class="border_bottom col-10"></td> 
       </tr>
       <tr>
              <td class="col-2 border_bottom">3</td> 
              <td class="border_bottom col-10"></td> 
       </tr>
       <tr>
              <td class="col-2 border_bottom">4</td> 
              <td class="border_bottom col-10"></td> 
       </tr>
       <tr>
              <td class="col-2 border_bottom">5</td> 
              <td class="border_bottom col-10"></td> 
       </tr>
       </table>

       <div class="row encabezado1"> VI. DECLARACION </div>
       <div class="row"> Como productor/a declaro mi conformidad con lo expresado en esta ficha y afirmo que no aplico procedimientos no declarados. </div>

       <table>
       <tr>
              <td class="col-2" rowspan="2">PORCENTAJE DE CUMPLIMIENTO =</td> 
              <td class="dividir"># Ítem cumplidos</td> 
              <td class="border_bottom dividir"></td> 
              <td class="col-1" rowspan="2">=</td> 
              <td class="border_bottom" rowspan="2"></td> 
              <td rowspan="2">%</td> 
       </tr>
       <tr>
              <td ># Ítem que aplican</td> 
              <td class="border_bottom"></td> 
              
       </tr>
       </table>

       <div class="row encabezado1"> VII. LEVANTAMIENTO DE LAS NO CONFORMIDADES </div>

       <table>
       <tr>
              <td class="border_bottom">Punto de Control</td> 
              <td class="border_bottom">No Conformidad</td> 
              <td class="border_bottom">Acción Correctiva</td> 
              <td class="border_bottom">Plazo del levantamiento</td> 
              <td class="col-2 border_bottom">¿Cumplió?</td> 
       </tr>
       <tr>
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="col-2 border_bottom"></td> 
       </tr>
       <tr>
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="col-2 border_bottom"></td> 
       </tr>
       <tr>
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="col-2 border_bottom"></td> 
       </tr>
       <tr>
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="col-2 border_bottom"></td> 
       </tr>
       <tr>
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="border_bottom"></td> 
              <td class="col-2 border_bottom"></td> 
       </tr>
       </table>

       <div class=""> FIRMA DEL INSPECTOR INTERNO </div>
       <div class="col-10 border_bottom">  </div>

       <div class="row encabezado1"> DECISION DEL COMITÉ DE APROBACIÓN Y SANCIONES </div>
       <div><input type="checkbox" ><label> Exclusión del Programa   </label></div>
       <div><input type="checkbox" ><label> Suspensión por un tiempo de  _____________</label></div>
       <div><input type="checkbox" ><label> No Conformidades y observaciones deben ser levantadas hasta la próxima inspección interna     </label></div>
       <div><input type="checkbox" ><label> Aprueba sin condiciones   </label></div>

      </div>
    ';
    $content.='</body>';//fin body
    $content.='</html>';//fin

    if($bImprimirAuto!='N'):   
      $content .= "<script type='text/javascript'>";
      $content .= "function cerrar() {
                  var ventana = window.self;
                  ventana.opener = window.self;
                  ventana.close();
                }";
      $content .= 'setTimeout("cerrar()", 2000);';
      $content .= "</script>"; 
    endif;

    return  $content; 
  }
 
}



if(!function_exists('imprimirHTMLPdf'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
 function imprimirHTMLPdf()
 {

var_dump(printer_list(PRINTER_ENUM_LOCAL));

/*$html = "<h1>Test de Impresión de Tickets</h1>";

$html = "Impresión automática desde la impresora escogida";

$printer='EPSON L210';

$enlace=printer_open($printer);

printer_write($enlace, $html);

printer_close($enlace);
      return  $content; */
  }
 
}




