DROP DATABASE IF EXISTS hotelxpress;

CREATE DATABASE hotelxpress;

\c hotelxpress;

CREATE TABLE user_type (
   id serial primary key,
   user_type varchar(50) not null
);

CREATE TABLE "user"(
   id serial primary key,
   firstname varchar(255) not null,
   lastname varchar(255),
   gender char(1) not null check(gender in ('M', 'F')),
   email varchar(255) unique check(email like '%@%'),
   phone_number varchar(50) not null,
   profil_url_img varchar(10485760),
   nationality varchar(255) not null,
   birthdate date not null,
   "password" varchar(255),
    user_type_id int not null references user_type(id)
);

CREATE TABLE room_content(
  id serial primary key,
  content_name varchar(150) not null,
  content_url_img varchar(10485760) not null
);

CREATE TABLE room_type (
  id serial primary key,
  "type" varchar(100) not null
);

CREATE TABLE media(
   id serial primary key,
   url_media varchar(255) not null
);

CREATE TABLE promotion (
  id serial primary key,
  start_date date not null default current_date,
  end_date date not null,
  reduction float not null,
  description text
);

CREATE TABLE reservation (
  id serial primary key,
  arrival timestamp not null,
  departure timestamp not null,
  date_reservation timestamp default current_date,
  user_id int not null references "user"(id),
  is_annulled boolean default false not null
);

CREATE TABLE payment (
  id serial primary key,
  date_payment timestamp not null default current_timestamp,
  method_payment varchar(150) not null,
  amount_paid float not null check(amount_paid > 0),
  reservation_id int not null references reservation(id)
);

CREATE TABLE hotel (
 id serial primary key,
 hotel_name varchar(255) not null,
 address varchar(255) not null,
 city varchar(255) not null,
 state varchar(255) not null,
 phone_number varchar(50)
);

CREATE TABLE room (
 id serial primary key,
 room_category varchar(100) not null,
 room_name varchar(200) not null,
 room_url_img varchar(10485760) not null,
 description text,
 price_per_night float check(price_per_night > 0),
 price_per_hour float check(price_per_hour > 0),
 hotel_id int not null references hotel(id),
 room_type_id int not null references room_type(id)
);

CREATE TABLE reservation_contain (
  id serial primary key,
  room_quantity int not null check(room_quantity > 1),
  room_id int not null references room(id),
  reservation_id int not null references reservation(id)
);

CREATE TABLE resto (
 id serial primary key,
 speciality varchar(255) not null,
 resto_url_img varchar(10485760) not null,
 description text,
 hotel_id int not null references hotel(id)
);

CREATE TABLE have_media (
 id serial primary key,
 media_id int not null references media(id),
 hotel_id int not null references hotel(id)
);

CREATE TABLE room_contain(
 id serial primary key,
 room_id int not null references room(id),
 room_content_id int not null references room_content(id)
);

CREATE TABLE partnership(
 id serial primary key,
 date_proposition timestamp default current_timestamp,
 partnership_type varchar(200),
 is_accepted boolean default false,
 message text
);

CREATE TABLE propose(
 id serial primary key,
 partnership_id int not null references partnership(id),
 user_id int not null references "user"(id)
);

CREATE TABLE have_proposition(
 id serial primary key,
 partnership_id int not null references partnership(id),
 hotel_id int not null references hotel(id)
);

CREATE TABLE give_hotel_feedback(
  id serial primary key,
  text_body text,
  date_feedback date default current_date,
  note int not null,
  user_id int not null references "user"(id),
  hotel_id int not null references hotel(id)
);

CREATE TABLE have_promotion(
 id serial primary key,
 promotion_id int not null references promotion(id),
 hotel_id int not null references hotel(id)
);

CREATE TABLE give_room_feedback(
  id serial primary key,
  text_body text,
  date_feedback date default current_date,
  note int not null,
  user_id int not null references "user"(id),
  room_id int not null references room(id)
);

CREATE TABLE bookmark(
 id serial primary key,
 bookmark_name varchar(255) not null,
 user_id int not null references "user"(id)
);

CREATE TABLE bookmark_contain (
    id SERIAL PRIMARY KEY,
    bookmark_id INT REFERENCES bookmark(id) NOT NULL,
    room_id INT REFERENCES room(id) NOT NULL
);
