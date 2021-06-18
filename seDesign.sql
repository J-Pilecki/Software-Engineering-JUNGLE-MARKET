/* Created by: J. Pilecki */


drop table Employee cascade constraints;

create table Employee
(empl_id int,
empl_lname varchar2(20),
empl_fname varchar(20),
empl_title varchar2(20),
empl_salary int,
empl_bonus int,
primary key (empl_id));

drop table Customer cascade constraints;

create table Customer
(cust_id int,
loyalty varchar2(20),
cust_fname varchar2(20),
cust_lname varchar2(20),
cust_phone varchar2(20),
cust_email varchar2(20),
primary key (cust_id));

drop table Product cascade constraints;

create table Product
(prod_id int,
prod_inventory int,
prod_price decimal(19,4) NOT NULL,
prod_name varchar2(20),
total_sales decimal(19,4) NOT NULL,
pic_num int,
primary key (prod_id));
             
drop table Department cascade constraints;

create table Department
(dept_num int,
dept_name varchar2(20),
empl_id int,
primary key (dept_num),
foreign key (empl_id) references Employee);

drop table Vendor cascade constraints;

create table Vendor
(ven_id int,
ven_phone varchar2(20),
ven_business_name varchar2(20),
ven_email varchar2(20),
prod_id int,
primary key (ven_id),
foreign key (prod_id) references Product);

drop table Product_Vendor_Supplies cascade constraints;

create table Product_Vendor_Supplies
(dept_num int,
prod_id int,
primary key (dept_num, prod_id),
foreign key (dept_num) references Department,
foreign key (prod_id) references Product);

drop table Quarterly_Finances cascade constraints;

create table Quarterly_Finances
(date_of_quarter date,
bool_bonus int,
prod_id int,
empl_id int,
projected_sales decimal(19,4),
actual_sales decimal(19,4) NOT NULL,
primary key (date_of_quarter),
foreign key (empl_id) references Employee,
foreign key (prod_id) references Product);

drop table Customer_Product_Purchases cascade constraints;

create table Customer_Product_Purchases
(purchase_hist int,
prod_id int,
cust_id int,
primary key (prod_id, cust_id),
foreign key (prod_id) references Product,
foreign key (cust_id) references Customer);



