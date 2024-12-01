docker exec some-mysql mysqldump -u root -p"admin" --all-databases > "$PWD/../prestashop/database-dump/dump.sql"
