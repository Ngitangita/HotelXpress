SELECT * FROM promotion INNER JOIN have_promotion 
ON promotion.id = have_promotion.promotion_id
INNER JOIN hotel 
ON have_promotion.hotel_id = hotel.id
WHERE  promotion.start_date >=  date1  AND promotion.end_date  <= date2;
