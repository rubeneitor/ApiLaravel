# PROYECTO DE CREACION DE UNA API CON LARAVEL



## Antes de comenzar
Primero de todo y antes de empezar a probar la API hay que tener una serie de consideraciones:

- Si dispones de windows como me pasó a mí, tendras que hacer lo siguiente: descargar php y copiar la ruta de instalación en las variables de entorno de windows.

- Programas necesarios para probar la Api:
    - Visual Studio Code u otro editor de código similar
    - MySQL Workbench junto con el driver de MySQL server y el servicio (descargable todo desde su web)
    - POSTMAN para probar los endpoints


## Ejecución de la prueba
1.- Clonar el repositorio en tu editor de texto

2.- Usar el comando 'composer install' para instalar todas las dependecias

3.- Crear una base de datos o Schema en MySQL Workbench

4.- En el archivo .env del proyecto cambiar los ajustes necesarios segun la conexion que realizes a la base de datos y apuntando hacia el Schema creado

5.- Realizar las pruebas en POSTMAN creando anteriormente datos de prueba en la base de datos

6.- Crear los endpoints que consideres necesarios según tu proyecto

## Para usar en la aplicación
Una vez tenido la API construida con todos los endpoints deseados creados, es hora de realizar la parte del frontend para que los usuarios o clientes puedan conectarse a la API y trabajar con ella.

- Inicio de sesión junto con el logout

- Consultar el perfil del usuario

- Gestionar la aplicación 

- Consultar datos 