SELECT
    room.*
FROM
    room
LEFT JOIN
    reservation_contain
ON
    reservation_contain.room_id = room.id
LEFT JOIN
    reservation
ON
    reservation_contain.reservation_id = reservation.id
WHERE
    age(arrival, departure) < age(arrival, current_timestamp + interval '1 days')
OR
   age(arrival, departure) IS NULL;