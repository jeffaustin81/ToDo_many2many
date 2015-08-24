## _Start UP:_

To access the MySQL shell, open the bash terminal and run:
```
$ mysql.server start
```
followed by the command
```
$ mysql -uroot -proot
```

If you're working with MAMP at home, once you've started the servers, you can access your MySQL terminal by entering:
```
$ /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot
```

## _Build Database:_

```
-> CREATE DATABASE to_do;

-> USE to_do;

-> CREATE TABLE tasks (id serial PRIMARY KEY, description varchar (255), category_id int, due_date date);

-> CREATE TABLE categories (id serial PRIMARY KEY, name varchar (255));



```
