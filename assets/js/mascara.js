/*
--------------------------------------------------------------------------------
FASM (ADS) - Programação para Web II
--------------------------------------------------------------------------------
ESCRITO POR.: Aldecir de Almeida Fonseca
DATA/HORA...: 13/04/2015 as 03:45
FINALIDADE..: Mascara para valores em REAL (moeda)

COMO USAR NO HTML: onKeyUp="mask_valor(this,event,'##.###.###.###,##',true)"
--------------------------------------------------------------------------------
*/

function mask_valor(w,e,m,r,a)
{ 

    // Cancela se o evento for Backspace 
    if (!e) var e = window.event 
    if (e.keyCode) code = e.keyCode; 
    else if (e.which) code = e.which; 

    // Variaveis da fun��o

    var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse(); 
    var mask = (!r) ? m : m.reverse(); 
    var pre  = (a ) ? a.pre : ""; 
    var pos  = (a ) ? a.pos : ""; 
    var ret  = ""; 

    if ( code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length )
    {
        return false;
    }

    // Loop na m?scara para aplicar os caracteres 
    for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){ 
    if(mask.charAt(x)!='#'){ 
    ret += mask.charAt(x); x++; }  
    else { 
    ret += txt.charAt(y); y++; x++; } } 

    // Retorno da fun��o

    ret = (!r) ? ret : ret.reverse();


    if ( w.value.match("-") )
    {        
        w.value = "-"+ret+pos;
    }
    else
    {        
        w.value = pre+ret+pos;    
    }

} 

// Novo m?todo para o objeto 'String' 
String.prototype.reverse = function()
{ 
    return this.split('').reverse().join(''); 
} 



