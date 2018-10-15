
exportdb:
	mysqldump -h 192.168.99.100 -P 3306 -uroot -proot --databases cielo > init-sql/cielo.sql
