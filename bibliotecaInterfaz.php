<?php
/* Esta es una biblioteca de funciones que están diseñadas para mostrar
 * una interfaz sencilla de un teatro con los controles necesarios para 
 * elegir el puesto y la fila y las opcines si desea Reservar, Liberar ovender.
 */

/* La función encuentraSignificado() busca el color que recibe como parámetro
 * en un arreglo inicializado dentro de la misma función que contiene
 * los colores y sus significados y devuelve el significado del color recibido
 */


/* La función muestraTeatro() imprime una tabla HTML en la que muestra
 * simula los el estado de los puesto, esta recibe como para metro 
 * una cadena con los datos del estado de cada puesto.
 */

function muestraTeatro() {
    
if (!isset($_POST['cadena'])) {                 //Validamos si la variable POST se ha inicializado
    /*Si la varable no tiene Datos creamos el Teatro 
     *usando la funcion crear_Tertro
     */

   crear_Teatro();

} else{
    /*Si la varable tiene Datos creamos el Teatro 
     *usando la funcion actualizar_Tertro
     */
   actualizar_Teatro(); 
}
}


function cabecera_Teatro(){

    ?>
   
    <!-- Creamos el Teatro usando una tabla -->
    <div class="container">
    <table class="table table-striped table-bordered table-hover"> 
     <!--Parametros de la tabla Centrada, con bordes. -->
    <thead align=center> 
        <tr>
            <th colspan="6" >ESCENARIO</th>         <!--Titulo de la tabla-->
        </tr>
        <tr class="table-primary"><th>#</th>      <!--Titulos de Columna-->
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th></tr> 
<?php  


}



function crear_Teatro(){
//Creamos un teatro nuevo
cabecera_Teatro();

      for ($i=0;$i<=4;$i++){                      //Procedemos a crear los numeros de fila
        echo "<tr><th class= table-primary >". ($i+1) ."</th>";

           for ($col=0; $col < 5 ; $col++){
             echo "<td class=table-success>L</td>";                  //Creamos las filas de la tabla
           }
           
        }
           echo "</tr>";                        //Indicamos el final de la Fila

?> 

</thead>
</table> <!-- Etiqueta de cierre de la tabla -->
</div>
<br>

    <?php

}


function actualizar_Teatro(){

cabecera_Teatro();


$actualizaPuestos = modificar_Puestos();

//Actualizamos la informacion del teatro con los nuevos datos

//Tomamos los nuevos datos ya validados


for ($i=0;$i<=4;$i++){                  
        echo "<tr><th class= table-primary>". ($i+1) ."</th>";

           for ($col=0; $col < 5 ; $col++){

                $operacion = $actualizaPuestos [$i][$col];

                if($operacion == 'L'){
                    echo "<td class = table-success>" . $operacion . "</td>";
                }else if($operacion =='R'){
                    echo "<td class = table-warning>" . $operacion . "</td>";
                }else{
                    echo "<td class = table-danger>" . $operacion . "</td>";
                }
           }
}

           echo "</tr>";
       
?> 

</thead>
</table> <!-- Etiqueta de cierre de la tabla -->
</div>
<br>

    <?php

}







function mostrarFormulario(){

?>

<!--Declaramos furmulario con el metodo POST y usamos acction para refrescar la pagina.-->
<form align=center method="post" action="Index.php"> 

Fila: <input type="text" name="fila" id="fila"> <br><br>  <!--Declaramos el input tipo Text para elegir fila-->
Puesto: <input type="text" name="puesto" id="puesto"> <br><br> <!--Declaramos el input tipo Text para elegir puesto-->

<select name="tipo" id="tipo"> <!--Declaramos el control tipo select para elegir puesto-->
    <option value="reservar">Reservar</option>
    <option value="comprar">Comprar</option> <!--Opciones del select-->
    <option value="liberar">Liberar</option>
</select> <br><br>

<!--Contunuacion declaramos un textarea y mediante style establecemos modo oculto al usuario
Se usa el metodo serialize para pas el arrray cadena -->

<textarea name="cadena" id="cadena" cols="30" rows="10" style="display:none;" ><?php echo serialize(get_Puestos())?></textarea>


<!-- Reservar: <input type="radio" name="tipo" id="tipo" value="reservar">
Comprar: <input type="radio" name="tipo" id="tipo" value="comprar">
Liberar: <input type="radio" name="tipo" id="tipo" value="liberar"> -->

<input type="submit" value="Enviar"> <!--Bonton enviar-->
<input type="reset" value="Borrar"><!--Limpiamos el formulario-->

</form> <!-- etiqueta de cierre del formulario -->
<?php
}

