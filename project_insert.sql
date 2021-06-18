-- Team 4
create or replace procedure project_insert(cus_fname customer.cust_fname%TYPE,
                                        cus_lname customer.cust_lname%TYPE,
                                        cus_pho customer.cust_phone%TYPE,
                                        cus_email customer.cust_email%TYPE) 
as new_cust_id integer; 


BEGIN


    select nvl(max(cust_id), '0')
    into new_cust_id
    from Customer;

    insert into Customer(cust_id ,cust_fname, cust_lname, cust_phone, cust_email)
    values
    (new_cust_id + 2, cus_fname, cus_lname, cus_pho, cus_email);

end; 
/ 
show errors
