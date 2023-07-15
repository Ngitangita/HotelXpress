SELECT
    "user".*
FROM
    "user"
INNER JOIN
   give_hotel_feedback
ON
    "user".id = give_hotel_feedback.user_id
WHERE
    note < 0;