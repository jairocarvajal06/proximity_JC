# proximity_JC
Prueba de PHP 

Proyecto:
Motor de búsqueda

Descripción:
Desarrollar un motor de búsqueda con un campo de entrada.

Requisitos:
Al presionar el botón de búsqueda debe existir un código en JavaScript/jQuery que capture el valor del campo HTML y realice una llamada tipo API a un archivo de PHP.

El archivo de PHP debe realizar una serie de tareas:
-Capturar el valor si existe.
-Obtener los datos de un archivo JSON.
-Armar un listado tipo Array con los datos que coincidan con la búsqueda
-Retornar los valores en formato JSON

Finalmente mostrar los resultados de la búsqueda realizada en la página donde se muestra el campo de entrada.

Objetivos:
-Demostrar conocimiento en HTML
-Demostrar conocimiento y aplicación de código JavaScript/jQuery
-Demostrar conocimiento y aplicación de código PHP


--HERRAMIENTAS--

Para el front end se utilizó CSS3 Y HTML5 y Materialize v1.0.0
Para el request se utilzaron promesas, y dentro de la estructura de la promesa se utilizó AJAX con la ayuda de JQUERY v3.5.1
Se utilizó PHP 7.4.2

--Cómo se resolvió

Se creó un formulario que cuenta con un método onclick, este hace un llamado a un método JS dentro del archivo main.js, este método recoge el valor del formulario y lo envía atraves de un método tipo GET 
hacía un archivo llamado API.php, este recoge el valor y si existe lo sanitiza para evitar textos extraños, después carga el archivo json, luego de esto el json se convierte en un array para ser leído por php,
este array es recorrido y se utiliza el método array_search para buscar el keyword, si existe entonces lo agrega a otro array que es el que vamos a retornar al final en formato json.

Cuando desde el JS se recibe la respuesta de PHP, verifica que el resultado no este vacío si lo está es porque el keyword no existe, si no lo está entonces, agrega los resultados a un código html de una tabla y lo muestra.



