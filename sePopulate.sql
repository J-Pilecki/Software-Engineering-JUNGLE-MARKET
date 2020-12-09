/* Created by: Justin Pilecki */

delete from Customer_Product_Purchases;
delete from Quarterly_Finances;
delete from Product_Vendor_Supplies;
delete from Vendor;
delete from Product;
delete from Customer;
delete from Employee;

prompt Employee inserts

insert into Employee
values
(1, 'Smith', 'Susan', 'Sales', 1, 0);

insert into Employee
values
(2, 'Johnson', 'John', 'HR', 1, 0);

insert into Employee
values
(3, 'Barnard', 'Tabitha', 'Accounting', 1, 0);

insert into Employee
values
(4, 'Kent', 'Donald', 'Engineer', 1, 0);

insert into Employee
values
(5, 'Dent', 'Martha', 'Manager', 1, 0);

prompt Customer inserts

drop sequence cust_seq;

create sequence cust_seq
increment by 2
start with 1000;

insert into Customer
values
(cust_seq.nextval, '1234567', 'Mary', 'Richardson', '333-4433', 'one@one.org');

insert into Customer
values
(cust_seq.nextval, '111111', 'Elizabeth', 'Williams', '224-0023', 'two@two.com');

insert into Customer
values
(cust_seq.nextval, '2222222', 'Butch', 'Cassidy', '911', 'three@three.edu');

insert into Customer
values
(cust_seq.nextval, '8888888', 'Davey', 'Jones', '030-0303', 'four@four.gov');

insert into Customer
values
(cust_seq.nextval, '9876543', 'Mark', 'Miller', '837-4059', 'five@five.net');

prompt Product inserts

insert into Product
values
(1, 44, 12.99, 'coconut', 0.00, 0);

insert into Product
values
(2, 41, 15.55, 'palm', 0.00, 1);

insert into Product
values
(3, 35, 18.25, 'oak', 0.00, 2);

insert into Product
values
(4, 46, 16.23, 'fern', 0.00, 3);

insert into Product
values
(5, 10, 10.48, 'date', 0.00, 4);

insert into Product
values
(6, 45, 50.48, 'Cacao', 0.00, 5);

insert into Product
values
(7, 1515, 54.98, 'Redwood', 0.00, 6);

insert into Product
values
(8, 90, 18.69, 'Eucalytpus', 0.00, 7);

insert into Product
values
(9, 45, 58.58, 'Cedar', 0.00, 8);

insert into Product
values
(10, 9, 85.45, 'Maple', 0.00, 9);

insert into Product
values
(11, 6, 85.47, 'Apple', 0.00, 10);

insert into Product
values
(12, 54, 14.88, 'Banana', 0.00, 11);

insert into Product
values
(13, 56, 89.78, 'Baobab', 0.00, 12);

insert into Product
values
(14, 45, 17.47, 'Fox glove', 0.00, 13);

insert into Product
values
(15, 15, 81.48, 'Gumbo Limbo', 0.00, 14);

prompt Department inserts

insert into Department
values
(1, 'Nav', 1);

insert into Department
values
(2, 'Electrical', 2);

insert into Department
values
(3, 'Cams', 3);

insert into Department
values
(4, 'Medbay', 4);

insert into Department
values
(5, 'Engineering', 5);

prompt Vendor inserts

insert into Vendor
values
(1, '111-1111', 'Lyft', 'test@test.com', 1);

insert into Vendor
values
(2, '222-2222', 'Uber', 'quiz@quiz.org', 2);

insert into Vendor
values
(3, '333-3333', 'Apple', 'exam@exam.com', 3);

insert into Vendor
values
(4, '444-4444', 'Microsoft', 'ginger@ginger.com', 4);

insert into Vendor
values
(5, '555-5555', 'LIDS', 'true@false.com', 5);

prompt Product_Vendor_Supplies inserts

insert into Product_Vendor_Supplies
values
(1, 1);

insert into Product_Vendor_Supplies
values
(2, 2);

insert into Product_Vendor_Supplies
values
(3, 3);

insert into Product_Vendor_Supplies
values
(4, 4);

insert into Product_Vendor_Supplies
values
(5, 5);

prompt Quarterly_Finances inserts

insert into Quarterly_Finances
values 
('21-JAN-2000', 0, 1, 1, 100, 0);

prompt Customer_Product_Purchases inserts

insert into Customer_Product_Purchases
values
(77, 1, 1002);

insert into Customer_Product_Purchases
values
(3, 2, 1002);

insert into Customer_Product_Purchases
values
(0, 3, 1004);

insert into Customer_Product_Purchases
values
(19, 4, 1006);

insert into Customer_Product_Purchases
values
(5, 5, 1008);
