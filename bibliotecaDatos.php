<?php
/* Esta es una biblioteca de funciones que están diseñadas para mostrar
 * los datos de un arreglo que contiene un listado de los puesto del teatro
 * específicos, y permite hacer busquedas y realizar las operaciones del
 * negocio como son Reservar, Comprar y liberar retornado las modificaiones
 * para que sean aplicadoas a la interfaz grafiaca
 */

/* La función encuentraSignificado() busca el color que recibe como parámetro
 * en un arreglo inicializado dentro de la misma función que contiene
 * los colores y sus significados y devuelve el significado del color recibido
 */


function cargar_Puestos(){


     /* Inicialización del arreglo que contiene los puestos
     * del teatro en su estado original 'L'
     */
//Creamos el Array multidimencional   
 for ($i=0;$i<=4;$i++){ 

    for ($col=0; $col < 5 ; $col++){ 
             $puestos [$i][$col] = ('L');  //Creamos el Array
        }
} 


    return  $puestos;
}


function modificar_Puestos(){

$puestos = unserialize($_POST['cadena']);       //Reconstruimos el Array Textarea con el metoso unserialize.


// VALIDACIONES 
        $fila = $_POST['fila']-1;               //Obtenemos la fila y decrementamos para concidir con el array
        $puesto = $_POST['puesto']-1;           //Obtenemos la Columna y decrementamos para concidir con el array
        $tipo = $_POST['tipo'];                 //Obtenemos el tipo de operacion a realizar

        $buscar = $puestos[$fila][$puesto];     //Buscamos esta del puesto 

        if($buscar == 'V' && ($tipo == "reservar" || $tipo == "liberar")){    //Validamos si esta Vendido   
             
             /* Codigo de JavaScript que lanza una alerta al usuario-->>
              *Si esta Vendido enviamos alerta
              */
            echo '
                <script>
                    alert("La operación no puede ser realizada.");
                </script>
            ';
        }elseif ($buscar == 'L' && ($tipo == "reservar" || $tipo == "comprar")) {    //Validamos si esta Libre  

            if ($tipo == "reservar")
            {
                $puestos [$fila][$puesto] = ('R');                                  // Si verdadero puede ser Recervado
            }else
            {
                $puestos [$fila][$puesto] = ('V');                                  // Si falso puede ser Vendido
            }

            // Enviamos una alerta de confirmacion al usuario
             echo '
                <script>
                    alert("La operación ha sido exitosa.");
                </script>
            ';
        }elseif ($buscar == 'R' && ($tipo == "comprar" || $tipo == "liberar")) {    //Validamos si esta Reservado 
            
            if ($tipo == "liberar")
            {
                $puestos [$fila][$puesto] = ('L');                                  //Si verdadero puede ser Liberado
            }else
            {
                $puestos [$fila][$puesto] = ('V');                                  //Si falso puede ser Vendido
            }
            // Enviamos una alerta de confirmacion al usuario
            echo '
                <script>
                    alert("La operación ha sido exitosa.");
                </script>
            ';
        }else{
             // De no cumplir con nunguno de los creterios validos enviamos una alerta de al usuario 
            echo '
                <script>
                    alert("No se pudo relizar ninguna acción.");
                </script>
            ';
        }     



    return $puestos;
}


function get_Puestos(){


if (!isset($_POST['cadena'])) {                 //Validamos si la variable POST se ha inicializado

return cargar_Puestos();
     
}else{


$puestos = unserialize($_POST['cadena']);       //Reconstruimos el Array Textarea con el metoso unserialize.

// VALIDACIONES 
        $fila = $_POST['fila']-1;               //Obtenemos la fila y decrementamos para concidir con el array
        $puesto = $_POST['puesto']-1;           //Obtenemos la Columna y decrementamos para concidir con el array
        $tipo = $_POST['tipo'];                 //Obtenemos el tipo de operacion a realizar

        $buscar = $puestos[$fila][$puesto];     //Buscamos esta del puesto 

        if($buscar == 'V' && ($tipo == "reservar" || $tipo == "liberar")){    //Validamos si esta Vendido   
              //No modifica el array
           
        }elseif ($buscar == 'L' && ($tipo == "reservar" || $tipo == "comprar")) {    //Validamos si esta Libre  
             //Modifica el array
            if ($tipo == "reservar")
            {
                $puestos [$fila][$puesto] = ('R');                                  // Si verdadero puede ser Recervado
            }else
            {
                $puestos [$fila][$puesto] = ('V');                                  // Si falso puede ser Vendido
            }

            
        }elseif ($buscar == 'R' && ($tipo == "comprar" || $tipo == "liberar")) {    //Validamos si esta Reservado 
             //Modifica el array
            if ($tipo == "liberar")
            {
                $puestos [$fila][$puesto] = ('L');                                  //Si verdadero puede ser Liberado
            }else
            {
                $puestos [$fila][$puesto] = ('V');                                  //Si falso puede ser Vendido
            }
            
        }else{
             //No modifica el array
        }     

}



    return $puestos;
}



