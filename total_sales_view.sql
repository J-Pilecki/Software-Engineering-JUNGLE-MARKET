drop view sales_total;

create view sales_total(Total) as
select sum(total_sales)
from Product;