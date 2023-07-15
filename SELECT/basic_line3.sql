SELECT
    r.*, hotel_name
FROM
    reservation AS r
INNER JOIN
    reservation_contain AS rc
ON
    r.id = rc.reservation_id
INNER JOIN
    room
ON
    rc.room_id = room.id
INNER JOIN
    hotel
ON
    hotel.id = room.hotel_id
ORDER BY
    date_reservation
DESC;