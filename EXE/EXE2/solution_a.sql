
-- 1
SELECT * FROM Users ORDER BY user_name ASC;

-- 2
SELECT * FROM Users ORDER BY user_name ASC LIMIT 7;

-- 3
SELECT * FROM Users WHERE user_name LIKE '%a%' ORDER BY user_name ASC;

-- 4
SELECT * FROM Users WHERE user_name LIKE 'm%';

-- 5
SELECT * FROM Users WHERE user_name LIKE '%i';

-- 6
SELECT * FROM Users WHERE user_email LIKE '%@gmail.com';

-- 7
SELECT * FROM Users WHERE user_email LIKE '%@gmail.com' AND user_name LIKE 'm%';

-- 8
SELECT * FROM Users WHERE user_email LIKE '%@gmail.com' AND user_name LIKE '%i%' AND LENGTH(user_name) > 5;

-- 9
SELECT * FROM Users WHERE user_name LIKE '%a%' AND LENGTH(user_name) BETWEEN 5 AND 9 AND user_email LIKE '%@gmail.com' AND user_email LIKE '%i%';

-- 10
SELECT * FROM Users WHERE 
    (user_name LIKE '%a%' AND LENGTH(user_name) BETWEEN 5 AND 9) 
    OR (user_name LIKE '%i%' AND LENGTH(user_name) < 9) 
    OR (user_email LIKE '%@gmail.com' AND user_email LIKE '%i%');