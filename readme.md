Test para Tionvel
Francisco Gacitúa Maturana


<h1>Instalación</h1>
<ul>
	<li>Descargue o clone el repositorio desde https://github.com/fcogacituam/TestTionvel.git</li>
	<li>si descargó el archivo .zip, descomprimir.</li>
	<li>abrir el CMD y dirigirse al directorio del proyecto</li>
	<li>escribir el comando "composer install"</li>
	<li>una vez instaladas las dependencias inicie el servidor con el comando "php artisan serve"</li>
	<li>abra su navegador y escriba la dirección http://127.0.0.1:8000</li>
	<li>Ya está listo para utilizar y probar!</li>
</ul>
<h1>Prueba unitaria</h1>
<ul>
	<li>Para poder realizar la prueba unitaria, deje corriendo el servidor anterior y abra una nueva ventana de CMD, diríjase al diectorio del proyecto</li>
	<li>ingrese el comando "php artisan dusk"</li>
	<li>Si todo salió bien, la consola debiera arrojar el mensaje "OK (1 test, 4 assertions)"</li>
	<li>La prueba unitaria se encuentra (comentada) en el directorio tests/Browser/ExampleTest.php</li>
</ul>



<h1>Installation</h1>
<ul>
	<li>Download or clone this repo from https://github.com/fcogacituam/TestTionvel.git</li>
	<li>if you download it, uncompress.</li>
	<li>Open your CMD and go to the project's main directory</li>
	<li>write the command "composer install"</li>
	<li>When all dependencies are installed, start the server typing the command "php artisan serve"</li>
	<li>open your browser and write the URL http://127.0.0.1:8000</li>
	<li>You are ready to test and use!</li>
</ul>
<h1>Unit Test</h1>
<ul>
	<li>In order to make the Unit Test, let the server running and open another CMD window
	<li>go to the project's main directory.
	<li>write the command "php artisan dusk"
	<li>if everything is Ok, the console must show the message: "OK (1 test, 4 assertions)"
	<li>The unit Test is found (commented) in "tests/Browser/ExampleTest.php"
</ul>

