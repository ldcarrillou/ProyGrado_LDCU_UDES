// Constante que indica el prefijo de los archivos de comentarios
var acertada=new Image(11,11);
var fallada=new Image(11,11);
var fallada2=new Image(11,11);
var nada=new Image(11,11);
acertada.scr="comunes/correcto.gif";
fallada.scr="comunes/fallado.gif";
fallada2.scr="comunes/fallada3.gif";
nada.scr="comunes/nada.gif";

var totalRespuestas=5;
var Resp=new crearArray(totalRespuestas);
Resp[1]="b";
Resp[2]="c";
Resp[3]="a";
Resp[4]="d";
Resp[5]="b";
Resp[6]="a";
Resp[7]="c";
Resp[8]="a";
Resp[9]="c";
Resp[10]="b";
Resp[11]="d";
Resp[12]="c";

var numresp = new Array;
numresp[1]=4;
numresp[2]=4;
numresp[3]=4;
numresp[4]=4;
numresp[5]=4;
numresp[6]=2;
numresp[7]=4;
numresp[8]=2;
numresp[9]=4;
numresp[10]=4;
numresp[11]=4;
numresp[12]=4;
var acla = new crearArray(totalRespuestas);

function crearArray(n) {
	this.length=n;                         
	for (var x=1;x<=n;x++) {
		this[x]='';
	}
	return this;
}

var Bueno=new crearArray(totalRespuestas);
var pulsado=0; // No ha sido pulsado

//document.getElementById("Resp").value = totalRespuestas;
//var fecha_act = new Date();
var fecha_act = new Date(year, month, day, hours, minutes, seconds, milliseconds);
//document.write(fecha_act.getDate() + "-" + (fecha_act.getMonth() +1) + "-" + fecha_act.getFullYear());
/*document.write(fecha_act.getFullYear() + "-" + (fecha_act.getMonth() +1) + "-" + fecha_act.getDate()
        + " " + fecha_act.getHours()+":" + fecha_act.getMinutes()+":" + fecha_act.getSeconds());*/

function aclaracion(i) { //Saca un mensaje de aclaraci?n de la respuesta
	if ((pulsado!=0) & (acla[i]!="")) {alert(acla[i]);}
}

function OpcionElegida(item) { // Calcula la respuesta devuelta
	for (var i=0; i<item.length;i++) {  
		if (item[i].checked) {
			break;
		}
	}
	if (i==0) return'a';
	if (i==1) return'b';
	if (i==2) return'c';
	if (i==3) return'd';
}

function BorrarImg() { //cambia el src de las imagenes de los botones, borra las respuestas
pulsado=0;
	for(i=0;i<totalRespuestas;i++) {
		for(j=1;j<=numresp[i+1];j++) {
			if (j==1) {eval('document.I'+(i+1)+'a.src=nada.scr')};
			if (j==2) {eval('document.I'+(i+1)+'b.src=nada.scr')};
			if (j==3) {eval('document.I'+(i+1)+'c.src=nada.scr')};
			if (j==4) {eval('document.I'+(i+1)+'d.src=nada.scr')};
		}	
	}
}

function Resultados() {
	var form=document.forms[0];
	var res=0;
	var cont=0;
	var cad='';
        var cad_err='';
        
        document.getElementById("Resp").value = totalRespuestas;
        
	for(i=1;i<=totalRespuestas;i++) { // recorre cada respuesta
		for(j=1;j<=numresp[i];j++) { //borra las imagenes de las respuestas
			if (j==1) {eval('document.I'+(i)+'a.src=nada.scr')};
			if (j==2) {eval('document.I'+(i)+'b.src=nada.scr')};
			if (j==3) {eval('document.I'+(i)+'c.src=nada.scr')};
			if (j==4) {eval('document.I'+(i)+'d.src=nada.scr')};
		}
		eval('res=OpcionElegida(form.R'+(i)+')');
   		if (res==Resp[i]) { // en res tenga la letra elegida, en resp[i] la letra correcta
   			Bueno[i-1]='1';
			cont++;
   			cad='document.I'+(i);
   			cad+=res+'.src=acertada.scr';
   			eval(cad);
                        
                        document.getElementById("Resp_correctas").value += cad;
                        
   		} else {
   			Bueno[i-2]='0';
 			cad='document.I'+(i);
                        
                        cad_err='document.I'+(i);
                        
                        //document.getElementById("Resp_erradas").value += cad_err;
                        
  			if (acla[i]=="") {
				cad+=Resp[i]+'.src=fallada.scr';
                                
                                //cad_err='document.I'+(i);
                                cad_err+=res+'.src=fallada.scr';
                                document.getElementById("Resp_erradas").value += cad_err;
                                
				}
			else {
				cad+=Resp[i]+'.src=fallada2.scr';
                                
                                //cad_err='document.I'+(i);
                                cad_err+=res+'.src=fallada2.scr';
                                document.getElementById("Resp_erradas").value += cad_err;
                                
				}
                                
                        //document.getElementById("Resp_erradas").value += cad_err;
                                
   			eval(cad);
                        
                        //eval(cad_err);
                        //document.getElementById("Resp_erradas").value += cad_err;
   		}
	}
	var Con="Has acertado "+cont+" preguntas.\n\n";

        document.getElementById("Num_correctas").value = cont;
        
        if (cont < totalRespuestas/2) {
		if (cont <= totalRespuestas/4) {
		   Con+="Hay que estudiar más";
		}
		else {
		   Con+="Te falta un poco";
		}
	}
	else {
		if (cont < totalRespuestas*0.7) {
		   Con+="¡Prueba superada!";
		}
		else {
			if (cont < totalRespuestas*0.9) {
			   Con+="¡Muy Bien!";
			}
			else {
			   Con+="¡Perfecto, eres un fiera!";
			}
		}
	}
	alert(Con);
	pulsado=1;
}

function dibujarRadio(preg, opcion) {
	document.write(" <a href=\"Javascript: void(0)\" onClick=\"Javascript: aclaracion("+preg+")\"  class=\"enlacenormal\">\n <img src=\"comunes/nada.gif\" alt=\"\" name=\"I"+preg+opcion+"\" width=\"11\"  height=\"11\" border=\"0\" align=\"absmiddle\"></a>\n	 <input type=\"radio\" value=\""+opcion+"\" name=\"R"+preg+"\"  align=\"absmiddle\"> "+opcion+") ");
}
