<?php
function conectaBase ($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos){
if (!$enlace= @mysql_connect($cons_equipo,$cons_usuario,$cons_contra)){
//notemos la arroba antepuesta a la función que devolvía error
return false;
} elseif (!mysql_select_db(cons_base_datos)){
return false;
} else {
return true;
}
}
?>
