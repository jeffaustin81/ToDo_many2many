## _SQL notes_


creates "actors", with a "name" row that accepts a string of 50 characters:
```
CREATE TABLE actors (name VARCHAR(50));
```
creates "movies", with "title" accepts a string of 200 characters and "year" that accepts a wole number:
```
CREATE TABLE movies (title VARCHAR(200), year INTEGER);
```
adds a row in the "movies" table for Avatar:
```
INSERT INTO movies VALUES ("Avatar", 2009);
```

```
/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot

> CREATE DATABASE test_database;
> SHOW DATABASES;
> USE test_database;
> SELECT DATABASE();
```

"devon get the tables"
```
> CREATE TABLE contacts (name VARCHAR (255), age INT, birthday DATETIME);
> DESCRIBE contacts;
> SHOW TABLES;
> DROP TABLE table_name;

> ALTER TABLE contacts ADD favorite_color text;
> ALTER TABLE contacts DROP favorite_color;

> ALTER TABLE contacts ADD id serial PRIMARY KEY;

> INSERT INTO contacts (name, age, birthday) VALUES ('Wes', 43, '1969-05-01');
> INSERT INTO contacts (name, age, birthday) VALUES (‘Tanner’, 26, ‘1988-12-09’);

> SELECT LAST_INSERT_ID();
> SELECT name FROM contacts;
```

[more here](https://www.learnhowtoprogram.com/lessons/basics-of-sql-weekend-homework)
