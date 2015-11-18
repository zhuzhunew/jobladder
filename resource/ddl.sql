CREATE TABLE jt_admin (
admin_id INT NOT NULL AUTO_INCREMENT,
/* TODO */
PRIMARY KEY (admin_id)
);

CREATE TABLE jt_user (
user_id INT NOT NULL AUTO_INCREMENT,
email VARCHAR(128) NOT NULL,
login_name VARCHAR(64) NOT NULL,
first_name VARCHAR(64) NOT NULL,
middle_name VARCHAR(64),
last_name VARCHAR(64) NOT NULL,
password VARCHAR(64) NOT NULL,
creat_time DATETIME NOT NULL,
user_type TINYINT NOT NULL,
status TINYINT NOT NULL,
/* TODO */
PRIMARY KEY (user_id)
);

CREATE TABLE jt_mentor (
user_id INT NOT NULL,
/* TODO */
PRIMARY KEY (user_id)
);

ALTER TABLE jt_mentor
ADD CONSTRAINT mentor_user_fk FOREIGN KEY (
    user_id) REFERENCES jt_user (user_id);

CREATE TABLE jt_account (
user_id INT NOT NULL,
/* TODO */
PRIMARY KEY (user_id)
);

ALTER TABLE jt_account
ADD CONSTRAINT account_user_fk FOREIGN KEY (
    user_id) REFERENCES jt_user (user_id);

CREATE TABLE jt_user_activity (
user_activity_id BIGINT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
activity_type TINYINT NOT NULL,
create_time DATETIME NOT NULL,
creator INT;
description VARCHAR;
/* TODO */
PRIMARY KEY (user_activity_id)
);

ALTER TABLE jt_user_activity
ADD CONSTRAINT user_activity_user_fk FOREIGN KEY (
    user_id) REFERENCES jt_user (user_id);

ALTER TABLE jt_user_activity
ADD CONSTRAINT user_activity_admin_fk FOREIGN KEY (
    creator) REFERENCES jt_admin (admin_id);

CREATE TABLE jt_role (
role_id INT NOT NULL AUTO_INCREMENT,
/* TODO */
PRIMARY KEY (role_id)
);

CREATE TABLE jt_premission (
premission_id INT NOT NULL AUTO_INCREMENT,
/* TODO */
PRIMARY KEY (premission_id)
);

CREATE TABLE jt_user_role (
user_id INT NOT NULL,
role_id INT NOT NULL,
/* TODO */
PRIMARY KEY (user_id, role_id)
);

ALTER TABLE jt_user_role
ADD CONSTRAINT user_role_user_fk FOREIGN KEY (
    user_id) REFERENCES jt_user (user_id);

ALTER TABLE jt_user_role
ADD CONSTRAINT user_role_role_fk FOREIGN KEY (
    role_id) REFERENCES jt_role (role_id);

CREATE TABLE jt_role_premission(
role_id INT NOT NULL,
premission_id INT NOT NULL,
/* TODO */
PRIMARY KEY (role_id, premission_id)
);

ALTER TABLE jt_role_premission
ADD CONSTRAINT role_premission_role_fk FOREIGN KEY (
    role_id) REFERENCES jt_role (role_id);
	
ALTER TABLE jt_role_premission
ADD CONSTRAINT role_premission_premission_fk FOREIGN KEY (
    premission_id) REFERENCES jt_premission (premission_id);

CREATE TABLE jt_goods(
goods_id INT NOT NULL AUTO_INCREMENT,
owner_id INT NOT NULL,
/* TODO */
PRIMARY KEY (goods_id)
);

ALTER TABLE jt_goods
ADD CONSTRAINT goods_user_fk FOREIGN KEY (
    owner_id) REFERENCES jt_user (user_id);

CREATE TABLE jt_user_goods(
user_id INT NOT NULL,
goods_id INT NOT NULL,
/* TODO */
PRIMARY KEY (user_id, goods_id)
);

ALTER TABLE jt_user_goods
ADD CONSTRAINT user_goods_user_fk FOREIGN KEY (
    user_id) REFERENCES jt_user (user_id);
	
ALTER TABLE jt_user_goods
ADD CONSTRAINT user_goods_goods_fk FOREIGN KEY (
    goods_id) REFERENCES jt_goods (goods_id);

CREATE TABLE jt_transaction(
transaction_id INT NOT NULL AUTO_INCREMENT,
goods_id INT NOT NULL,
customer_id INT NOT NULL,
/* TODO */
PRIMARY KEY (transaction_id)
);

ALTER TABLE jt_transaction
ADD CONSTRAINT transaction_goods_fk FOREIGN KEY (
    goods_id) REFERENCES jt_goods (goods_id);
	
ALTER TABLE jt_transaction
ADD CONSTRAINT transaction_user_fk FOREIGN KEY (
    customer_id) REFERENCES jt_user (user_id);	

CREATE TABLE jt_transaction_activity(
transaction_activity_id INT NOT NULL AUTO_INCREMENT,
transaction_id INT NOT NULL,
/* TODO */
PRIMARY KEY (transaction_activity_id)
);

ALTER TABLE jt_transaction_activity
ADD CONSTRAINT transaction_activity_transaction_fk FOREIGN KEY (
    transaction_id) REFERENCES jt_transaction (transaction_id);	

CREATE TABLE jt_payment(
payment_id INT NOT NULL AUTO_INCREMENT,
transaction_id INT NOT NULL,
/* TODO */
PRIMARY KEY (payment_id)
);

ALTER TABLE jt_payment
ADD CONSTRAINT jt_payment_transaction_fk FOREIGN KEY (
    transaction_id) REFERENCES jt_transaction (transaction_id);