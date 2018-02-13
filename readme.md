Test para Tionvel
Francisco Gacitúa Maturana


<h1>Instalación</h1>
Descargue o clone el repositorio desde https://github.com/fcogacituam/TestTionvel.git
si descargó el archivo .zip, descomprimir.
abrir el CMD y dirigirse al directorio del proyecto
escribir el comando "composer install"
una vez instaladas las dependencias inicie el servidor con el comando "php artisan serve"
abra su navegador y escriba la dirección http://127.0.0.1:8000
Ya está listo para utilizar y probar!

<h1>Prueba unitaria</h1>
Para poder realizar la prueba unitaria, deje corriendo el servidor anterior y abra una nueva ventana de CMD, diríjase al diectorio del proyecto
ingrese el comando "php artisan dusk"
Si todo salió bien, la consola debiera arrojar el mensaje "OK (1 test, 4 assertions)"

La prueba unitaria se encuentra (comentada) en el directorio tests/Browser/ExampleTest.php



<h1>Installation</h1>
Download or clone this repo from https://github.com/fcogacituam/TestTionvel.git
if you download it, uncompress.
Open your CMD and go to the project's main directory
write the command "composer install"
When all dependencies are installed, start the server typing the command "php artisan serve"
open your browser and write the URL http://127.0.0.1:8000
You are ready to test and use!

<h1>Unit Test</h1>
In order to make the Unit Test, let the server running and open another CMD window
go to the project's main directory.
write the command "php artisan dusk"
if everything is Ok, the console must show the message: "OK (1 test, 4 assertions)"

The unit Test is found (commented) in "tests/Browser/ExampleTest.php"