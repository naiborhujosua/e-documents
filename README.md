
You probably want [`E-Documents`](http://edocuments.pe.hu/) as an application for helping company about managing bussiness trip documents
<img width="800" src="edocuments.jpeg">

## Install

```
$ git clone https://github.com/naiborhujosua/e-documents.git
```
```
Download [XAMPP](https://www.apachefriends.org/) for local server
```
```
on your browser click localhost/phpmyadmin
```
```
On the PhpMyadmin, create database called db_surat
```
```
Goes to localhost/[database_name]
Enjoy E-Document by entering password admin and username is admin
```

## Usage
* [$server Below are configuration for local server by XAMPP]
 * @var String [<$server>] as servername
 * @var [String] [<$username>] as username for server
 * @var [String] [<$password>] as password for server
 * @var [String] [<$database>] as database name for server
```php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_surat";
```
## Future Features
1. Implementation of API for delivering email usage for an automatic notifiaction to the receiver if there is any changes
2. Add an Graphic for Data of employeer for knowing the growth of the bussiness trip done
3. Add any specic calculation of bussiness trip cost for building analytical algorithm

## Profile
[Josua Antonius Naiborhu](https://id.linkedin.com/in/josuanaiborhu)

