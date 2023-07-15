SELECT
    promotion.*
FROM
    promotion
INNER JOIN
    have_promotion
ON
    have_promotion.promotion_id = promotion.id
INNER JOIN
    hotel
 ON
    have_promotion.hotel_id = hotel.id
WHERE
    promotion.start_date >= date1
AND
    promotion.end_date <= date2:

--- date1 et date2 interval nommé  periode