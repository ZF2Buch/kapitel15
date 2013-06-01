ZF2 Buch - Kapitel 15
=====================

Die Projektdateien für das Kapitel 15 vom Buch **Zend Framework 2 - Von den 
Grundlagen bis zur fertigen Anwendung** (*ISBN 978-3-8273-2994-3*) von Ralf Eggert 
aus dem Addison-Wesley Verlag installieren Sie wie folgt:

* Sie können die Projektdateien als ZIP von der Website http://www.awl.de/2994 
  unter Downloads oder von GitHub https://github.com/ZF2Buch/kapitel15 herunter
  laden und in einem geeigneten Verzeichnis entpacken, z.B.
```
  /home/devhost/zf2buch/kapitel15
```
  
* Alternativ wechseln Sie ins Verzeichnis `/home/devhost/zf2buch/` und clonen das
  GitHub Repository entsprechend, z.B.
```
    $ cd /home/devhost/zf2buch/
    $ git clone https://github.com/ZF2Buch/kapitel15.git
    $ cd kapitel15/
```
  
* Nun aktualisieren Sie den Composer und installieren das Projekt inklusive
  aller Abhängigkeiten
```
    $ php composer.phar selfupdate
    $ php composer.phar install
```

* Als Letztes müssen Sie einen Virtual Host für den Apache2 einrichten oder einen
  bestehenden entsprechend anpassen.
```
    $ sudo touch /etc/apache2/sites-available/luigis-pizza.local
    $ sudo gedit /etc/apache2/sites-available/luigis-pizza.local
```
  Der Virtual Host könnte so aussehen:
```
    <VirtualHost *>
      ServerName luigis-pizza.local
      DocumentRoot /home/devhost/zf2buch/kapitel15/public/
      AccessFileName .htaccess
      <Directory /home/devhost/zf2buch/kapitel15/public/>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
      </Directory>
    </VirtualHost>
```
  Weitere Details zum Einrichten des Virtual Hosts entnehmen Sie bitte den 
  Kapiteln *3.1.4 Virtual Host einrichten unter Linux* und *3.1.5 Virtual Host 
  einrichten unter Windows*
  
* Nun sollten Sie das Projekt unter http://luigis-pizza.local in Ihrem Browser 
  aufrufen können.

Hinweise zum Zend Framework Release 2.2.0
-----------------------------------------

Durch Änderungen im Translator wird im Application Modul leider folgender Fatal
Error ausgegeben:

* Catchable fatal error: Argument 1 passed to Zend\Validator\AbstractValidator::setDefaultTranslator() 
  must be an instance of Zend\Validator\Translator\TranslatorInterface, 
  instance of Zend\I18n\Translator\Translator given, called in 
  /home/devhost/zf2buch/kapitel22/module/Application/src/Application/Listener/ApplicationListener.php 
  on line 157 and defined in 
  /home/devhost/zf2buch/kapitel22/vendor/zendframework/zendframework/library/Zend/Validator/AbstractValidator.php 
  on line 472
  
  Um die Skripte mit ZF 2.2.0 zu nutzen, bitte in der Datei 
  module/Application/src/Application/Listener/ApplicationListener.php bei den
  `use` Statements die Zeile
  
  ```
  use Zend\I18n\Translator\Translator;
  ```
    
  auskommentieren und die Zeile
  
  ```
  use Zend\Mvc\I18n\Translator;
  ```
    
  einkommentieren.
  
  