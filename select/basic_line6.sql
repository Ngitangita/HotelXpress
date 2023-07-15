SELECT
    u.*
FROM
    "user" AS u
INNER JOIN
    reservation AS r
ON
    r.user_id = u.id
INNER JOIN
    payment
ON
    r.id = payment.reservation_id
INNER JOIN
    reservation_contain AS rc
ON
    r.id = rc.reservation_id
INNER JOIN
    room AS rm
ON
    rm.id = rc.reservation_id
WHERE
    COALESCE(
        date_part('days',age(r.departure::date, r.arrival::date)) * rm.price_per_night * rc.room_quantity,
        date_part('hour', age(r.departure, r.arrival)) * rm.price_per_hour*rc.room_quantity
   ) > amount_paid;
