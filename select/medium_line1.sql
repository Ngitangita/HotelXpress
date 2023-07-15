SELECT
    COUNT(reservation.user_id)
FROM
    reservation
INNER JOIN
    reservation_contain
ON
    reservation_contain.reservation_id = reservation.id
INNER JOIN
    room
ON
    reservation_contain.room_id = room.id
INNER JOIN
    hotel
ON
    hotel.id = room.hotel_id
GROUP BY
 reservation.user_id;