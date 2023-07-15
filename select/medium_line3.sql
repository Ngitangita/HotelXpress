SELECT
    COUNT(reservation.id)
FROM
    reservation
INNER JOIN
    "user"
ON
    "user".id = reservation.user_id
INNER JOIN
    user_type
ON
    "user".user_type_id = user_type.id
GROUP BY
    user_type.user_type;