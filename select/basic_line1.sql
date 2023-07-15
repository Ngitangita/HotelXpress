SELECT DISTINCT
    u.*, h.*
FROM
    user AS u
INNER JOIN
    user_type AS ut
ON
    ut.id = u.user_type_id
INNER JOIN
    bookmark AS b
ON
    b.user_id = u.id
INNER JOIN
    room AS r
ON
    r.id = b.room_id
INNER JOIN
    hotel AS h
ON
    h.id = r.hotel_id
WHERE
    ut.user_type = 'receptionist';