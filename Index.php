<!DOCTYPE html>

<!---DESARROLLO WEB CON PHP (2351721) P21730185 CO2351721 R95 C9533
    Aprendiz: JAMITH ALEXANDER GARCIA ARRIETA CC. 19.618.834
    Evidencia: Taller “Uso de formularios para transferencia” --->

    <?php
    /* El propósito de esta evidencia, es permitir que el usuario interactúe 
     * y seleccione opciones para una tarea específica.
     */

    /* Usted ha sido contratado para desarrollar una aplicación web con PHP 
    *para gestionar las sillas de un pequeño teatro, ya que el gerente 
    *quiere ofrecer a sus clientes la posibilidad de reservar y/o comprar 
    *sus boletas de entrada a través de Internet.
    */

    //Espesificaciones

    /*
    *El teatro tiene una sala de 5 filas y cada una cuenta con 5 sillas 
    */

    ?>


<html> 
    <head> 
         <meta http-equiv="Content-Type" 
          content="text/html; charset=ISO-8859-1" />

        <!-- Para la presentación de este formulario no se requiere de
        código PHP solo HTML, se usó una plantilla CSS gratuita
        descargada de internet que se vincula en la siguiente línea.-->

        <!--<link rel="stylesheet" href="css/bootstrap.css">  -->

        <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
     </head>
      <body topmargin="10" leftmargin="10" marginwidth="10" marginheight="10" scroll="no" style="overflow:hidden">
    <?php
    
    require_once './bibliotecaInterfaz.php';
    require_once './bibliotecaDatos.php';
    ?> 

    <?php
         muestraTeatro();
         mostrarFormulario();
    ?>

</body>
</html>