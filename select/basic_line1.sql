SELECT "user".* FROM "user" INNER JOIN user_type ON user_type.id = "user".user_type_id 
INNER JOIN  reservation ON "user".id =  reservation.user_id 
INNER JOIN reservation_contain  ON reservation.id  = reservation_contain.reservation_id
INNER JOIN room ON  room.id =  reservation_contain.room_id
INNER JOIN  hotel ON  hotel.id =  room.hotel_id
WHERE user_type.user_type =  'Receptionist';
