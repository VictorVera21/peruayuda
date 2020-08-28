function getID(id) {
    return document.getElementById(id).value;
}
function innerHTML(id, result) {
    return document.getElementById(id).innerHTML=result;
}
function contadorCarateres() {
    setInterval(function () {
        var c = getID("textarea");
        if (c.length>255){
            innerHTML("textVista", "SOLO SON 255 CARACTERES");
        }else{
            innerHTML("textVista", c.length);
        }
        
    },0000);
}