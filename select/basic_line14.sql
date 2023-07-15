SELECT
    room.*
FROM
    room
INNER JOIN
    reservation_contain
ON
    reservation_contain.id = room.id
INNER JOIN
    reservation
ON
    reservation_contain.reservation_id = reservation.id
WHERE
    is_annulled = false
AND
    reservation.user_id = x;
