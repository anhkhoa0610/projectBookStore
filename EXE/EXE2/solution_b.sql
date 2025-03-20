

-- 1. 
SELECT u.user_id, u.user_name, o.order_id 
FROM Orders o, Users u 
WHERE o.user_id = u.user_id;

-- 2. 

SELECT u.user_id, u.user_name, COUNT(o.order_id)
FROM Users u, Orders o
WHERE u.user_id = o.user_id
GROUP BY u.user_id, u.user_name;

-- 3. 

SELECT o.order_id, COUNT(d.product_id)
FROM Orders o, Order_details d
WHERE o.order_id = d.order_id
GROUP BY o.order_id;

-- 4. 

SELECT u.user_id, u.user_name, o.order_id, p.product_name
from users u, orders o, order_details d, products p
where u.user_id = o.user_id and o.order_id = d.order_id and d.product_id = p.product_id
group by o.order_id;

-- 5. 

SELECT u.user_id, u.user_name, count(o.order_id) as quantity
FROM users u, orders o
WHERE u.user_id = o.user_id
GROUP BY u.user_id, u.user_name
ORDER BY quantity desc
LIMIT 7;

-- 6.

SELECT DISTINCT u.user_id, u.user_name, o.order_id, p.product_name
FROM users u, orders o, order_details d, products p
WHERE u.user_id = o.user_id and o.order_id = d.order_id and d.product_id = p.product_id and (p.product_name LIKE '%Samsung%' or p.product_name LIKE '%Apple%')
LIMIT 7;

-- 7. 

SELECT u.user_id, user_name, o.order_id, sum(p.product_price) as Total
FROM users u, orders o, order_details d, products p
WHERE u.user_id = o.user_id and o.order_id = d.order_id and d.product_id = p.product_id
GROUP BY o.order_id;

-- 8. 

SELECT u.user_id, u.user_name, o.order_id, MAX(m.TotalPrice) AS MaxTotal
FROM (SELECT o.order_id, SUM(p.product_price) AS TotalPrice 
      FROM orders o, order_details d, products p
      WHERE o.order_id = d.order_id and d.product_id = p.product_id
      GROUP BY o.order_id) AS m, orders o, users u
WHERE o.user_id = u.user_id and m.order_id = o.order_id
GROUP BY o.user_id;

-- 9.

SELECT u.user_id, u.user_name, o.order_id, MIN(m.TotalPrice) AS MinTotal
FROM (SELECT o.order_id, SUM(p.product_price) AS TotalPrice 
      FROM orders o, order_details d, products p
      WHERE o.order_id = d.order_id and d.product_id = p.product_id
      GROUP BY o.order_id) AS m, orders o, users u
WHERE o.user_id = u.user_id and m.order_id = o.order_id
GROUP BY o.user_id;

-- 10. 

SELECT u.user_id, u.user_name,o.order_id ,MAX(c.TotalCount) as Total
FROM (SELECT d.order_id, COUNT(d.product_id) as TotalCount
     FROM order_details d
     GROUP BY d.order_id) as c, users u, orders o
WHERE c.order_id = o.order_id and u.user_id = o.user_id
GROUP BY u.user_id
