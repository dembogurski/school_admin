<?php
/** db_form.log__.php		Group database form
 * 
 * @author	Sergio A. Pohlmann <sergio@ycube.net>
 * @date	Jun, 15 of 2005
 */
 
//function LoadForm( $Obj )
//{

$Obj->SetName ( "LOG Control" );
$Obj->SetAlias( "Registro de Operaciones en el sistema");
$Obj->File = "p_log";
$Obj->Filter = "db.log__";

$Obj->Add(
	array(
	F_NAME_		=> "user",
	F_ALIAS_	=> "Usuario", 
	F_HELP_		=> "Codigo del Usuario",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 40,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "year",
	F_ALIAS_	=> "A�o", 
	F_HELP_		=> "A�o de la operaci�n",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 40,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "month",
	F_ALIAS_	=> "Mes", 
	F_HELP_		=> "Mes de la operaci�n",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 40,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "day",
	F_ALIAS_	=> "D�a", 
	F_HELP_		=> "D�a de la operaci�n",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 40,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "hour",
	F_ALIAS_	=> "HH", 
	F_HELP_		=> "Hora de la operaci�n",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 40,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "minute",
	F_ALIAS_	=> "MM", 
	F_HELP_		=> "Minuto de la operaci�n",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 40,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "action",
	F_ALIAS_	=> "Acci�n", 
	F_HELP_		=> "Acci�n del usuario",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 80,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "status",
	F_ALIAS_	=> "ST", 
	F_HELP_		=> "Status de Retorno",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 40,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));
$Obj->Add(
	array(
	F_NAME_		=> "obs",
	F_ALIAS_	=> "Observaci�n", 
	F_HELP_		=> "Observaci�n autom�tica",
	F_TYPE_		=> "text",
	F_LENGTH_	=> 80,
	F_BROW_		=> 1,
	G_SHOW_		=> '1'
));


?>