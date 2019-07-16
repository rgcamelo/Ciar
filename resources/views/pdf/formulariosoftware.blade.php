<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formateo Software</title>
</head>
<body>
    
        <link rel="stylesheet" href="admintle\css\estilos.css">
        <style>
            @font-face {
                font-family: candara;
                src: url("{{ asset('fuentes/CANDARA.ttf') }}");
                font-weight: normal;
            }
        </style>
        <div>
        <table border="1" align="center" cellspacing="0" cellpadding="0" width="500" style="border:solid rgb(0, 0, 0) 1.0pt;
        border-top:none;background:rgb(255, 255, 255)">
            <tbody>
                <tr>
                    <td rowspan="2" width="60" height="70">
                        <div>
                            <img
                                    width="60"
                                    height="60"
                                    class="imagen"
                                    src="admintle/img/upc.png"
                                    alt="Descripción: NuevoLogoUPC"
                            />
                            <strong></strong>
                        </div>
                    </td>
                    <td  style="font-family:candara; text-align:center;font-size: 13pt">
                            <strong>UNIVERSIDAD POPULAR DEL CESAR</strong>
                    </td>
                    <td style="font-family: Arial;font-size: 9.0pt" >
                        <div>
                                CODIGO: 304-201.1-PRO05-FOR20
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="222">
                        <div align="center" style="font-family: Candara;font-size: 11pt">
                            FORMATO DE SOLICITUD DE EVALUACIÓN DE PRODUCTOS
                            ACADÉMICOS:<strong> SOFTWARE</strong>
                        </div>
                    </td>
                    <td width="83" style="font-family: Arial;font-size: 9.0pt">
                        <p>
                                VERSIÓN: 1
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>  

        <div class="parrafo" >
        <p>
            Mediante este documento radico ante el CIARP de la Universidad Popular del
            Cesar, solicitud de evaluación de la producción académica aquí relacionada,
            siguiendo los lineamientos establecidos en el decreto 1279 de Junio de 2002
            y el acuerdo del Consejo Superior Universitario N°005 de 20 de enero de
            2004.
        </p>
        </div>
        
        <div>
        <table border="1" align="center" cellspacing="0" cellpadding="0" width="500" style="border:solid #9BBB59 1.0pt;
        border-top:none;background:rgb(248, 248, 248)">
            <tbody>
                <tr>
                    <td  colspan="14"  class="backTitle">
                            <strong>INFORMACION GENERAL</strong>
                    </td>
                </tr>
                <tr>
                    <td  valign="top"  class="backGreen">
                            <strong>FECHA DE SOLICITUD</strong>
                    </td>
                    <td  colspan="13" valign="top" class="backGreen">
                            {{$solicitud->created_at}}
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td  valign="top" class="backWhite">

                            <strong>NOMBRE COMPLETO DEL DOCENTE</strong>
                    </td>
                    <td  colspan="13" valign="top" class="backWhite">
                    
                            <strong></strong>
                      
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="backGreen">
                            <strong>DEDICACIÓN</strong>
                    </td>
                    <td colspan="5" valign="top" class="backGreen">
                            <strong>TIEMPO COMPLETO</strong>
                    </td>
                    <td colspan="3" valign="top" class="backGreen">
                            <strong></strong>
                    </td>
                    <td colspan="2" valign="top" class="backGreen">
                            <strong>MEDIO TIEMPO</strong>
                    </td>
                    <td colspan="3" valign="top" class="backGreen">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="backWhite">
                            <strong>IDENTIFICACIÓN</strong>
                    </td>
                    <td valign="top" class="backWhite">
                            <strong>C.C.</strong>
                    </td>
                    <td valign="top" class="backWhite">
                            <strong></strong>
                    </td>
                    <td valign="top" class="backWhite">
                            <strong>C. EXT</strong>
                    </td>
                    <td valign="top" class="backWhite">
                            <strong></strong>
                    </td>
                    <td valign="top" colspan="2" class="backWhite">
                            <strong>NÚMERO</strong>
                    </td>
                    <td colspan="7" valign="top" class="backWhite">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="backGreen">
                            <strong>FACULTAD</strong>
                    </td>
                    <td colspan="13" valign="top" class="backGreen">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="backWhite">
                            <strong>DEPARTAMENTO</strong>
                    </td>
                    <td colspan="13" valign="top" class="backWhite">
                        <p>
                            <strong></strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td  valign="top" class="backGreen">
                            <strong>GRUPO DE INVESTIGACIÓN AL QUE PERTENECE </strong>
                    </td>
                    <td colspan="9" valign="top" class="backGreen">
                            <strong></strong>
                    </td>
                    <td colspan="1" valign="top" class="backGreen">
                            <strong>CATEGORÍA</strong>
                    </td>
                    <td colspan="3" valign="top" class="backGreen">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="backWhite">
                            <strong>CORREO ELECTRÓNICO</strong>
                    </td>
                    <td colspan="13" valign="top" class="backWhite">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="backGreen">
                            <strong>TELÉFONOS <em>(FIJO Y CELULAR)</em></strong>
                    </td>
                    <td colspan="2" valign="top" class="backGreen">
                            <strong>FIJO</strong>
                    </td>
                    <td colspan="5" valign="top" class="backGreen">
                    </td>
                    <td valign="top" class="backGreen">
                            <strong>MÓVIL</strong>
                    </td>
                    <td colspan="5" valign="top" class="backGreen">
                        
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <br>
        <div>
        <table align="center" border="1" cellspacing="0" cellpadding="0" width="500" style="border:solid  #9BBB59 1.0pt;
        border-top:none;background:rgb(248, 248, 248)">
            <tbody>
                <tr>
                    <td  colspan="13"  class="backTitle">
                            <strong>DATOS DEL SOFTWARE</strong>
                    </td>
                </tr>
                <tr>
                    <td width="200" class="backGreen">
                            <strong>TÍTULO DEL SOFTWARE</strong>
                    </td>
                    <td  colspan="12" valign="top" class="backGreen">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td  class="backWhite">
                            <strong>AUTORES:</strong>
                    </td>
                    <td colspan="12" valign="top" class="backWhite">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td class="backGreen">
                            <strong>TITULAR(ES) DEL SOFTWARE:</strong>
                    </td>
                    <td  colspan="12"  class="backGreen">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td  class="backWhite">
                            <strong>RESULTADO EVALUACIÓN DE PARES</strong>
                    </td>
                    <td colspan="12"  class="backWhite">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td  class="backGreen">
                            <strong>¿SE EVIDENCIA CRÉDITO A LA UPC?</strong>
                    </td>
                    <td   class="backGreen">
                            <strong>SI</strong>
                    </td>
                    <td  colspan="5" class="backGreen">
                            <strong></strong>
                    </td>
                    <td   class="backGreen">
                            <strong>NO</strong>
                    </td>
                    <td colspan="5"   class="backGreen">
                          <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td class="backWhite"> 
                            <strong>¿IMPACTA EL SOFTWARE EN<strong><br>
                            <strong> LA COMUNIDAD UNIVERSITARIA?</strong>
                    </td>
                    <td  class="backWhite">
                            <strong>SI</strong>
                    </td>
                    <td  colspan="5" valign="top" class="backWhite">
                            <strong></strong>
                    </td>
                    <td  class="backWhite">
                            <strong>NO</strong>
                    </td>
                    <td  colspan="5" class="backWhite">
                        <p>
                            <strong></strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <center>
        <div class="parrafo">
            Para atender la valoración de su solicitud, tenga en cuenta que requiere anexar: Código fuente y/o algoritmo según el lenguaje utilizado, instrucciones de uso según el lenguaje utilizado, manuales técnicos del usuario (Word, Pdf) , programa ejecutable, Una (1) copia de la certificación de registro del software expedida por autoridad competente, evidencia de actualización en CVLac (Pantallazo), Evidencia de actualización del GrupLac (Pantallazo), Certificación del impacto interno en la UPC por una autoridad competente.
        </div>
        </center>
        <div align="center">
            <table  align="center" border="1" cellspacing="0" cellpadding="0" width="500" style="border:solid #9BBB59 1.0pt;
            border-top:none;background:rgb(248, 248, 248)">
                <tbody>
                    <tr>
                        <td class="backTitle">
                            <strong>FIRMA DEL DOCENTE</strong>
                        </td>
                        <td  class="backTitle">
                            <strong>RADICADO EN ARCHIVO Y CORRESPONDENCIA</strong>
                        </td>
                    </tr>
                    <tr>
                        <td  class="backGreen">
                        </td>
                        <td  class="backGreen">
                                <br>
                                <br>                        
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <table align="center" border="1" cellspacing="0" cellpadding="0" width="500" style="border:solid #9BBB59 1.0pt;
        border-top:none;background:rgb(248, 248, 248)">
            <tbody>
                <tr>
                    <td  colspan="5" class="backTitle">
                            <strong>ESPACIO EXCLUSIVO DEL CIARP </strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="backGreen">
                        <strong>APROBADO (SI/NO) </strong>
                    </td>
                    <td class="backGreen">
                            <strong>SI</strong>
                    </td>
                    <td  class="backGreen">
                            <strong></strong>
                    </td>
                    <td  class="backGreen">
                            <strong>NO</strong>
                    </td>
                    <td  class="backGreen">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td  class="backWhite">
                            <strong>¿SE EVIDENCIA UN APORTE SIGNIFICATIVO DEL AUTOR? </strong>
                    </td>
                    <td class="backWhite">
                            <strong>SI</strong>
                    </td>
                    <td  class="backWhite">
                            <strong></strong>
                    </td>
                    <td class="backWhite"
                            <strong>NO</strong>
                    </td>
                    <td  class="backWhite">
                            <strong></strong>
                    </td>
                </tr>
                <tr>
                    <td  class="backGreen">
                            <strong>PUNTOS ASIGNADOS (</strong>
                            <strong>
                                NÚMEROS Y LETRAS): PS (Puntos salariales), BO
                                (Bonificaciones)
                            </strong>
                            <strong></strong>
                    </td>
                    <td class="backGreen"
                            <strong>PS</strong>
                    </td>
                    <td  class="backGreen">
                            <strong></strong>
                    </td>
                    <td class="backGreen">
                            <strong>BO</strong>
                    </td>
                    <td  class="backGreen">
                            <strong></strong>
                    </td>
                </tr>
            </tbody>
        </table>
    
</body>
</html>

