# report
I saprated the tmplate in for file in side the includes foolder to be easy orgnized and 
easy to be edit and I included all this inside the layout file 
1-content 
2-navbar
3-sidebar
4-footer

And the report and statsics is inside the dashboard file which extends the layout and we have five report   
-1 the Total Stock show us all product in the stock   
-2 Total Sales show us all The Sales   
-3  Total Purchases show us all The Purchases   
All this made by card   
-4 the Sales Trend which show us Monthly sales overview   
-5 the Purchases Trend which show us Monthly purchases overview   
And this made by apexcharts type line chart   
In the Stock Report Controller there is the Eloquent method for   
1- for the Calculate total stock using she sum method to sum the stock_quantity  
2-  Calculate total sales using the sum method to sum the amount and the where method to check the type = sell  
3- Calculate total purchases using the sum method to sum the amount and the where method to check the type = purchases  
4- Get stock trends using selectRaw to select the monthes from the transaction_date and sum the amount and group it by month also order by month where type = sell  
4- Get stock trends using selectRaw to select the monthes from the transaction_date and sum the amount and group it by month also order by month where type = purchase  
in the end send it to the blade by compact  
