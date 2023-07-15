SELECT
    hotel.*
FROM
    hotel
INNER JOIN
    room
ON
    room.hotel_id = hotel.id
WHERE
    description
ILIKE
    x
AND
    description
ILIKE
  x;