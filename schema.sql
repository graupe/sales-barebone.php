/*
 * schema.sql
 * Copyright (C) 2016 sas <stefan.andre.schulze@gmail.com>
 *
 * Distributed under terms of the MIT license.
 */

CREATE TABLE customer (
customer_id mediumint(8) unsigned NOT NULL auto_increment,
gender enum('female','male','') NOT NULL,
firstname varchar(50) NOT NULL,
lastname varchar(50) NOT NULL,
PRIMARY KEY (customer_id)
);

INSERT INTO customer VALUES (1, 'female', 'Dagmar', 'Bösel');
INSERT INTO customer VALUES (2, 'male', 'Dietmar', 'Maier');
INSERT INTO customer VALUES (3, 'female', 'Sabine', 'Kanter');


CREATE TABLE sales1 (
sale_id mediumint(8) unsigned NOT NULL auto_increment,
customer_id mediumint(8) unsigned NOT NULL,
sale_amount decimal(10,2) NOT NULL,
sale_date datetime NOT NULL,
PRIMARY KEY (sale_id)
);

INSERT INTO sales1 VALUES (1, 3, 14.40, '2007-04-02 11:37:06');
INSERT INTO sales1 VALUES (2, 1, 28.30, '2007-05-14 11:37:18');
INSERT INTO sales1 VALUES (3, 2, 34.40, '2007-05-06 11:38:14');
INSERT INTO sales1 VALUES (4, 2, 25.60, '2007-05-07 11:38:39');


CREATE TABLE sales2 (
sale_id mediumint(8) unsigned NOT NULL auto_increment,
customer_id mediumint(8) unsigned NOT NULL,
sale_amount decimal(10,2) NOT NULL,
sale_date datetime NOT NULL,
PRIMARY KEY (sale_id)
);


INSERT INTO sales2 VALUES (1, 2, 68.20, '2007-04-06 11:37:06');
INSERT INTO sales2 VALUES (2, 3, 21.30, '2007-04-12 11:37:18');
INSERT INTO sales2 VALUES (3, 3, 54.40, '2007-05-06 11:38:14');
INSERT INTO sales2 VALUES (4, 1, 35.70, '2007-05-07 11:38:39');

-- vim:et
