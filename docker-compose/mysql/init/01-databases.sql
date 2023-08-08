# create databases
CREATE DATABASE IF NOT EXISTS `local_laravel`;

# create local_developer user and grant rights
CREATE USER 'root'@'laravel' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'local_developer'@'%';

