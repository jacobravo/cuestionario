Instrucciones:
1- Clonar repositorio con el comando 
$ git clone https://github.com/jacobravo/cuestionario.git
Debe clonarse en la carpeta de destino del web server, generalmente llamada www.
2- En la base de datos correr en .sql adjunto.
3- Se copia dentro de la carpeta clonada el archivo .env.example y a la copia se le llama .env
4. Se colocan en el .env las credenciales de base de datos. Por defecto apunta a localhost, usuario root y sin clave
5. Con Composer instalado, dentro de la carpeta clonada se corren los comandos:
$ composer update
$ composer dump-autoload
6. Se puede ingresar por browser al proyecto por:
localhost/cuestionario/public
7. Las credenciales son:
Administrador:
admin@test.com pass admin
usuario@test.com pass usuario
