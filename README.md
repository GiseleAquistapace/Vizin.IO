@TODO: escrever o README

* Esse projeto usa mod_rewrite no htacess para o index.php - Certifique-se que o Apache está com AllowOverride All
* Habilitar o PDO Mysql no php.ini
* Configure no hosts do seu SO: 127.0.0.1 vizin.io
* Se você está usando o xampp, configure no htdocs do seu Apache o DocumentRoot para a pasta do projeto vizin.io. Exemplo:
DocumentRoot "C:/xampp/htdocs/Vizin.IO"
* Também no htdocs, atualize o Directory:
<Directory "C:/xampp/htdocs/Vizin.IO">

Não se esqueça que após mexer nas configurações do servidor, você terá que reiniciar o servidor.