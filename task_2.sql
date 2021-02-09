SELECT login, password, name, status
FROM users 
JOIN objects 
WHERE users.object_id = objects.id;