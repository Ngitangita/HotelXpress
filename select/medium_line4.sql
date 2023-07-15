SELECT
    room.*
FROM
    room
INNER JOIN
    room_contain
ON
    room_contain.room_id = room.id
GROUP BY
    room_contain.room_content_id
HAVING
    COUNT(room_contain.room_content_id) > 1;