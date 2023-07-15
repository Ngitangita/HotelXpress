SELECT
    room.*
FROM
    room
WHERE
    (price_per_night <= x AND price_per_night >= y)
OR
    (price_per_hour <= x AND price_per_hour >= y);