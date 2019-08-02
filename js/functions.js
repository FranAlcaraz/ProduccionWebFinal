
function scrollFunction(doc) {
    if (doc.body.scrollTop > 20 || doc.documentElement.scrollTop > 20) {
        doc.getElementById("btnUp").style.display = "block";
    } else {
        doc.getElementById("btnUp").style.display = "none";
    }
}

function goTop(doc) {
    doc.body.scrollTop = 0;
    doc.documentElement.scrollTop = 0; 
}


function obtenerProducto(doc, id_producto) { 
	$.ajax({
	   type: "POST",
	   url: 'vistas/obtener-producto.php',
	   dataType: 'json',
	   data:{id_producto:id_producto},
	   success:function(html) {
		 //console.log(html);
		 //doc.getElementById("modalbody").innerHTML = html;
		 $('#modalbody').html(html);
		 $('#myModal').modal('show');
	   }
  });
} 

function iniciarDoc(){
	window.onscroll = function() {scrollFunction(document)};
    
	$('.dropdown-submenu a.test').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	});
}
