SELECT
   COUNT(room_quantity)
FROM
    reservation_contain
INNER JOIN
    reservation
ON
    reservation.id = reservation_contain.reservation_id
WHERE
     reservation.user_id = x
AND
    reservation.date_reservation >= date1
AND
    reservation.date_reservation <= date2;
--- date1 et date2 interval nommé  periode
-- x: un hotel donnéé