<br/><br/>

<a href="javascript:;" class="btn btn-primary " onclick="descargar_liquidacion();">Descargar</a>
<a href="javascript:;" class="btn btn-primary " onclick="descargar_liquidacion();">Imprimir</a>


<br/><br/>
<div class="container theme-showcase" role="main">
        <div class="row">
            <table border="2" style="background-color:#FFFFFF;border-collapse:collapse;border:2px solid #000000;color:#000000;width:100%" cellpadding="30" cellspacing="1">
                <tr>
                    <td style="padding: 20px;">
                        <p style="text-align: center; font-family: Arial; font-weight: bold;">LIQUIDACION DE REMUNERACIONES<br/>Enero 2016</p>
                    </td>
                </tr>
            </table>

            <table border="2" style="background-color:#FFFFFF;border-collapse:collapse;border:2px solid #000000;color:#000000;width:100%; margin-top: 20px;" cellpadding="30" cellspacing="1">
                <tr>
                    <td style="padding: 20px; width: 45%;" align="left" width="45%;">
                        <p style="font-family: Arial; font-weight: bold;">Empleador: Transportes Santiago IRL.</p>
                        <p style="font-family: Arial; font-weight: bold;">Dirección: Anduvilo 913, El Bosque, Santiago.</p>
                    </td>
                    
                    <td style="padding: 20px; width: 45%;" align="right" width="45%">
                        <p style="font-family: Arial; font-weight: bold;">RUT: 11.111.111-1.</p>
                        <p style="font-family: Arial; font-weight: bold;">E-mail: personal@transaportes-santiago.cl</p>
                    </td>
                </tr>
            </table>
            
            <table border="2" style="background-color:#FFFFFF;border-collapse:collapse;border:2px solid #000000;color:#000000;width:100%; margin-top: 20px;" cellpadding="30" cellspacing="1">
                <tr>
                    <td style="padding: 20px; width: 45%;" align="left" width="45%;">
                        <p style="font-family: Arial; font-weight: bold;">Nombre Empleado: <?php echo $usuario->nombre; ?></p>
                        <p style="font-family: Arial; font-weight: bold;">RUT: <?php echo $usuario->rut; ?></p>
                        <p style="font-family: Arial; font-weight: bold;">Cargo: <?php echo $usuario->cargo; ?></p>
                        <p style="font-family: Arial; font-weight: bold;">AFP: <?php echo $usuario->afp_nombre; ?></p>
                        <p style="font-family: Arial; font-weight: bold;">ISAPRE: <?php echo ucfirst($usuario->salud); ?></p>
                    </td>
                    
                    <td style="padding: 20px; width: 45%;" align="right" width="45%">
                        <p style="font-family: Arial; font-weight: bold;">Fecha de ingreso: <?php echo (new DateTime($usuario->fecha_incorporacion))->format('d/m/Y'); ?>.</p>
                        <p style="font-family: Arial; font-weight: bold;">Días trabajados: <?php echo $dias_trabajados; ?></p>
                        <p style="font-family: Arial; font-weight: bold;">Horas extra: 0,0</p>
                        <p style="font-family: Arial; font-weight: bold;">&nbsp;</p>
                    </td>
                </tr>
            </table>
            
            <table border="0" style="margin-top: 20px;" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left" width="49%;">
                        
                        <table border="2" style="background-color:#FFFFFF;border-collapse:collapse;border:2px solid #000000;color:#000000;width:100%" cellpadding="0" cellspacing="1">
                            <tr>
                                <td>
                                    <p style="text-align: center; font-family: Arial; font-weight: bold; padding-top: 10px;">HABERES</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px;">
                                    <table border="0" style="margin-top: 0px;" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td width="70%">Sueldo base</td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['sueldo_base'],0,".","."); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Bono</td>
                                            <td width="30%" align="right">$100.000</td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Gratificación legal</td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['gratificacion'],0,".","."); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Horas extra</td>
                                            <td width="30%" align="right">$0</td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Colación</td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['colacion'],0,".","."); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Movilización</td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['movilizacion'],0,".","."); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="70%"><hr></td>
                                            <td width="30%" align="right"><hr></td>
                                        </tr>
                                        <tr>
                                            <td width="70%"><strong>Total haberes</strong></td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['haberes'],0,".","."); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="" align="right" width="2%">
                        <p>&nbsp;</p>
                    </td>
                    <td style="" align="right" width="49%">
                        <table border="2" style="background-color:#FFFFFF;border-collapse:collapse;border:2px solid #000000;color:#000000;width:100%" cellpadding="30" cellspacing="1">
                            <tr>
                                <td>
                                    <p style="text-align: center; font-family: Arial; font-weight: bold; padding-top: 10px;">DESCUENTOS</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px;">
                                    
                                    <table border="0" style="margin-top: 0px;" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td width="70%">Cotización AFP</td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['afp'],0,".","."); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Comisión AFP</td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['comision'],0,".","."); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Cotización salud</td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['salud'],0,".","."); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Seguro de cesantía</td>
                                            <td width="30%" align="right">$0</td>
                                        </tr>
                                        <tr>
                                            <td width="70%">Anticipo</td>
                                            <td width="30%" align="right">$5.000</td>
                                        </tr>
                                        <tr>
                                            <td width="70%">&nbsp;</td>
                                            <td width="30%" align="right">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="70%"><hr></td>
                                            <td width="30%" align="right"><hr></td>
                                        </tr>
                                        <tr>
                                            <td width="70%"><strong>Total descuentos</strong></td>
                                            <td width="30%" align="right">$<?php echo number_format($liquidacion['descuentos'],0,".","."); ?></td>
                                        </tr>
                                    </table>
                                    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            
            <table border="2" style="background-color:#FFFFFF;border-collapse:collapse;border:2px solid #000000;color:#000000;width:100%; margin-top: 20px;" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding: 20px;" align="left" width="50%;">
                        <p style="font-family: Arial; font-weight: bold;">Total líquido a pagar.</p>
                    </td>
                    
                    <td style="padding: 20px;" align="right" width="50%">
                        <p style="font-family: Arial; font-weight: bold;">$<?php echo number_format($liquidacion['liquido'],0,".","."); ?> $<?php echo number_format($liquidacion['esperado_liquido'],0,".","."); ?></p>
                    </td>
                </tr>
            </table>
            <br/>
            <p>EN LETRAS : <?php $l = new NumberToLetterConverter(); echo @$l->to_word($liquidacion['liquido'],'ARS').' PESOS'; ?></p>
            <br/><br/>
        </div>
    </div> <!-- /container -->