<?php
  crear(); //Creamos el archivo
 // leer();  //Luego lo leemos
   
  //Para crear el archivo
  function crear(){
      $bd = new mysqli('localhost', 'root', '', 'sistemadeventas') or die("Error al conectar con MySQL-> ".mysql_error());
    
       $stmt = $bd->prepare("SELECT IDempleado, Nombre, apellidoPat, apellidoMat, numTelefonico FROM empleados");
       $stmt->execute();
       $stmt->store_result();
       $stmt->bind_result($IDempleado, $Nombre, $apellidoPat, $apellidoMat, $numTelefonico); 
  
       $xml = new DomDocument('1.0', 'UTF-8');
  
      $ventas = $xml->createElement('ventas');
      $ventas = $xml->appendChild($ventas);
  
      while($stmt->fetch()) {
     
        $empleado = $xml->createElement('empleado');
        $empleado = $ventas->appendChild($empleado);
 
        $nodo_IDempleado = $xml->createElement('IDempleado', $IDempleado);
        $nodo_IDempleado = $empleado->appendChild($nodo_IDempleado);
        $nodo_Nombre = $xml->createElement('Nombre', $Nombre);
        $nodo_Nombre = $empleado->appendChild($nodo_Nombre);
        $nodo_apellidoPat = $xml->createElement('apellidoPat', $apellidoPat);
        $nodo_apellidoPat = $empleado->appendChild($nodo_apellidoPat);
        $nodo_apellidoMat = $xml->createElement('apellidoMat', $apellidoMat);
        $nodo_apellidoMat = $empleado->appendChild($nodo_apellidoMat);
        $nodo_numTelefonico = $xml->createElement('numTelefonico', $numTelefonico);
        $nodo_numTelefonico = $empleado->appendChild($nodo_numTelefonico);
       }
    
      // $stmt->free();
       $bd->close();
    
      $xml->formatOutput = true;
      $el_xml = $xml->saveXML();
      $xml->save('empleado.xml');
      
      //Mostramos el XML puro
      echo "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".
           htmlentities($el_xml)."
<hr>";
  }
  
?>
