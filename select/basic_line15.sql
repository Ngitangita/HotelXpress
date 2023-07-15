SELECT
    hotel.*
FROM
    hotel
WHERE
    id = (
    SELECT
        hotel_id
    FROM
        room
    INNER JOIN
        reservation_contain
    ON
        reservation_contain.room_id = room.id
    INNER JOIN
        reservation
    ON
        reservation_contain.reservation_id = reservation.id
    GROUP BY
        room.hotel_id
    ORDER BY
        COUNT(room.hotel_id) DESC
    LIMIT 1
);
