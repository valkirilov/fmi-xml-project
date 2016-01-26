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

.env
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=Idgz1PE3zO9iNc0E3oeH3CHDPX9MzZe3

APP_LOCALE=en
APP_FALLBACK_LOCALE=en

DB_CONNECTION=sqlite
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=memcached
SESSION_DRIVER=memcached
QUEUE_DRIVER=database

# MAIL_DRIVER=smtp
# MAIL_HOST=mailtrap.io
# MAIL_PORT=2525
# MAIL_USERNAME=null
# MAIL_PASSWORD=null
# MAIL_FROM_ADDRESS=null
# MAIL_FROM_NAME=null

# FILESYSTEM_DRIVER=local
# FILESYSTEM_CLOUD=s3

# S3_KEY=null
# S3_SECRET=null
# S3_REGION=null
# S3_BUCKET=null

# RACKSPACE_USERNAME=null
# RACKSPACE_KEY=null
# RACKSPACE_CONTAINER=null
# RACKSPACE_REGION=null


```
