Final Project for COSC 360
===
![Logo](img/Logo.png)

A project by Griffin Brome, and Patrick Mahler

## Setup - Linux

1. Install [XAMPP](https://www.apachefriends.org/index.html)

2. Start XAMPP server

```
sudo /opt/lampp/lampp start
```
3. Create the database
```
mysql -u root -p
mysql> CREATE DATABASE adventure_bulletin
```
4. Populate the database
```
mysql -u root -p  --socket=/opt/lampp/var/mysql/mysql.sock adventure_bulletin < data\adventure.sql
```
5. Move the project files to your htdocs/ folder in your XAMPP installation
```
make
```
_note:_ You will be prompted for sudo

6. Navigate to [localhost/public/home.php](http://localhost/public/home.php)

## Setup - Windows

1. Install [XAMPP](https://www.apachefriends.org/index.html)

2. Start XAMPP server
```
\xampp\xampp-control.exe
```
3. Create the database
```
\xampp\mysql\bin\mysql.exe –u root –p
mysql> CREATE DATABASE adventure_bulletin
```
4. Populate the database
```
\xampp\mysql\bin\mysql.exe –u root –p adventure_bulletin < data\adventure.sql
```
5. Move the project files to your htdocs/ folder in your XAMPP installation

6. Navigate to [localhost/public/home.php](http://localhost/public/home.php)
