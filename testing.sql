create or replace procedure give_bonus as 
      actual_sales_temp integer; 
      projected_sales_temp integer;

BEGIN

    select actual_sales
    into actual_sales_temp
    from Quarterly_Finances;

    select projected_sales
    into projected_sales_temp
    from Quarterly_Finances;

    if actual_sales_temp > projected_sales_temp then 
       update Quarterly_Finances
       set bool_bonus = 1; 

       update Employee 
       set Employee.empl_bonus = (select bool_bonus
                                  from Quarterly_Finances)
       where Employee.empl_id > 0; 

       update Employee
       set empl_salary = empl_salary + 3000
       where empl_bonus = 1;
      
    end if; 


end; 
/
show errors 

