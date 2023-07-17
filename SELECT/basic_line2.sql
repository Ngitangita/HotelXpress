SELECT reservation.* FROM reservation 
INNER JOIN reservation_contain ON reservation.id = reservation_contain.reservation_id
INNER JOIN room ON reservation_contain.room_id = room.id 
INNER JOIN hotel ON hotel.id = room.hotel_id
WHERE hotel.id = 1
ORDER BY reservation.date_reservation DESC;
