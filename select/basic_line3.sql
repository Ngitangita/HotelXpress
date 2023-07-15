SELECT
    room.*
FROM
    room
INNER JOIN
    room_type
ON
    room.room_type_id = room_type.id
INNER JOIN
    hotel
ON
    hotel.id = room.hotel_id
WHERE
    room_type.type = x
AND
    hotel.id = y;

--- NB: x = un type donné
---     y = un hotel donné
