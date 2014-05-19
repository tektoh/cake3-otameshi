#!/bin/sh

cd /vagrant

# CREATE TEMPORARY DIRECTORIES
mkdir -v -p tmp/{cache,logs,sessions,tests} tmp/cache/{models,persistent,views}

# UPDATE COMPOSER
if [ -f composer.lock ]; then
  /usr/local/bin/composer update
else
  /usr/local/bin/composer install
fi

# COPY app.php
if [ ! -f App/Config/app.php ]; then
  cp -v App/Config/app{.default,}.php
else

# CREATE DATABASE
mysql -u root -psecret -e "CREATE DATABASE my_app DEFAULT CHARSET utf8" > /dev/null 2>&1
mysql -u root -psecret -e "CREATE DATABASE test_myapp DEFAULT CHARSET utf8" > /dev/null 2>&1
mysql -u root -psecret -e "GRANT ALL PRIVILEGES ON *.* TO my_app@localhost IDENTIFIED BY 'secret' WITH GRANT OPTION"
mysql -u root -psecret -e "FLUSH PRIVILEGES"
