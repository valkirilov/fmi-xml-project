# fmi-xml-project

```
cd catalog
composer install

cd /etc/apache2/sites-available/
sudo touch fmi-jokes.com.conf
sudo vim fmi-jokes.com.conf

<VirtualHost www.fmi-jokes.com:80>
        ServerAdmin webmaster@fmi-jokes.mtr
        DocumentRoot [PATH-TO-PROJECT]/fmi-xml-project/catalog/public/
        <Directory />
            Options FollowSymLinks
            AllowOverride All
            Order deny,allow
            Require all granted
        </Directory>

        <Directory [PATH-TO-PROJECT]/fmi-xml-project/catalog/public/>
                Options Indexes FollowSymLinks Includes ExecCGI
                AllowOverride All
                Require all granted
        </Directory>
        ServerName www.fmi-jokes.mtr
        ServerAlias www.fmi-jokes.mtr
        ErrorLog /var/log/apache2/logs/fmi-jokes.www-error_log.log
        CustomLog /var/log/apache2/logs/fmi-jokes.www-access_log.log common
</VirtualHost>

sudo a2ensite fmi-jokes.com.conf 
sudo service apache2 restart 

sudo vim /etc/hosts

# FMI Projects
127.0.0.1       www.fmi-jokes.com

sudo chmod 777 -R storage


```
