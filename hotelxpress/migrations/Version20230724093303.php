<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230724093303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bookmark_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE give_hotel_feedback_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE give_room_feedback_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hotel_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE media_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE partnership_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE payment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE promotion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reservation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reservation_contain_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE resto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE room_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE room_content_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE room_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bookmark (id INT NOT NULL, user_id_id INT DEFAULT NULL, bookmark_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DA62921D9D86650F ON bookmark (user_id_id)');
        $this->addSql('CREATE TABLE give_hotel_feedback (id INT NOT NULL, user_id_id INT DEFAULT NULL, hotel_id INT DEFAULT NULL, text_body TEXT DEFAULT NULL, date_feedback DATE NOT NULL, note INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF08E90D9D86650F ON give_hotel_feedback (user_id_id)');
        $this->addSql('CREATE INDEX IDX_FF08E90D3243BB18 ON give_hotel_feedback (hotel_id)');
        $this->addSql('CREATE TABLE give_room_feedback (id INT NOT NULL, user_id_id INT DEFAULT NULL, room_id INT DEFAULT NULL, text_body TEXT DEFAULT NULL, date_feedback DATE NOT NULL, note INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_82C7424A9D86650F ON give_room_feedback (user_id_id)');
        $this->addSql('CREATE INDEX IDX_82C7424A54177093 ON give_room_feedback (room_id)');
        $this->addSql('CREATE TABLE hotel (id INT NOT NULL, hotel_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE hotel_media (hotel_id INT NOT NULL, media_id INT NOT NULL, PRIMARY KEY(hotel_id, media_id))');
        $this->addSql('CREATE INDEX IDX_89F86FC83243BB18 ON hotel_media (hotel_id)');
        $this->addSql('CREATE INDEX IDX_89F86FC8EA9FDD75 ON hotel_media (media_id)');
        $this->addSql('CREATE TABLE hotel_promotion (hotel_id INT NOT NULL, promotion_id INT NOT NULL, PRIMARY KEY(hotel_id, promotion_id))');
        $this->addSql('CREATE INDEX IDX_7F540C133243BB18 ON hotel_promotion (hotel_id)');
        $this->addSql('CREATE INDEX IDX_7F540C13139DF194 ON hotel_promotion (promotion_id)');
        $this->addSql('CREATE TABLE hotel_partnership (hotel_id INT NOT NULL, partnership_id INT NOT NULL, PRIMARY KEY(hotel_id, partnership_id))');
        $this->addSql('CREATE INDEX IDX_58D79C813243BB18 ON hotel_partnership (hotel_id)');
        $this->addSql('CREATE INDEX IDX_58D79C816AE7F85 ON hotel_partnership (partnership_id)');
        $this->addSql('CREATE TABLE media (id INT NOT NULL, url_media VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE partnership (id INT NOT NULL, date_proposition TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, partnership_type VARCHAR(255) DEFAULT NULL, is_accepted BOOLEAN DEFAULT NULL, message TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE partnership_user (partnership_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(partnership_id, user_id))');
        $this->addSql('CREATE INDEX IDX_62B0C6D26AE7F85 ON partnership_user (partnership_id)');
        $this->addSql('CREATE INDEX IDX_62B0C6D2A76ED395 ON partnership_user (user_id)');
        $this->addSql('CREATE TABLE payment (id INT NOT NULL, reservation_id INT DEFAULT NULL, date_payment TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, method_payment VARCHAR(255) NOT NULL, amount_paid DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6D28840DB83297E7 ON payment (reservation_id)');
        $this->addSql('CREATE TABLE promotion (id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, reduction DOUBLE PRECISION NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reservation (id INT NOT NULL, user_id_id INT NOT NULL, arrival TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, departure TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_reservation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_annulled BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_42C849559D86650F ON reservation (user_id_id)');
        $this->addSql('CREATE TABLE reservation_contain (id INT NOT NULL, room_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, room_quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2C7A4C4D54177093 ON reservation_contain (room_id)');
        $this->addSql('CREATE INDEX IDX_2C7A4C4DB83297E7 ON reservation_contain (reservation_id)');
        $this->addSql('CREATE TABLE resto (id INT NOT NULL, hotel_id INT DEFAULT NULL, speciality VARCHAR(255) NOT NULL, resto_url_img VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_892155B13243BB18 ON resto (hotel_id)');
        $this->addSql('CREATE TABLE room (id INT NOT NULL, hotel_id INT DEFAULT NULL, room_type_id INT DEFAULT NULL, room_category VARCHAR(255) NOT NULL, room_name VARCHAR(255) NOT NULL, room_url_img VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, price_per_night DOUBLE PRECISION DEFAULT NULL, price_per_hour DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_729F519B3243BB18 ON room (hotel_id)');
        $this->addSql('CREATE INDEX IDX_729F519B296E3073 ON room (room_type_id)');
        $this->addSql('CREATE TABLE room_room_content (room_id INT NOT NULL, room_content_id INT NOT NULL, PRIMARY KEY(room_id, room_content_id))');
        $this->addSql('CREATE INDEX IDX_A49594DA54177093 ON room_room_content (room_id)');
        $this->addSql('CREATE INDEX IDX_A49594DAB052D3F1 ON room_room_content (room_content_id)');
        $this->addSql('CREATE TABLE room_bookmark (room_id INT NOT NULL, bookmark_id INT NOT NULL, PRIMARY KEY(room_id, bookmark_id))');
        $this->addSql('CREATE INDEX IDX_7A8452D954177093 ON room_bookmark (room_id)');
        $this->addSql('CREATE INDEX IDX_7A8452D992741D25 ON room_bookmark (bookmark_id)');
        $this->addSql('CREATE TABLE room_content (id INT NOT NULL, content_name VARCHAR(255) NOT NULL, content_url_img VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE room_type (id INT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, user_type_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) DEFAULT NULL, gender VARCHAR(1) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, profil_url_img VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D93D6499D419299 ON "user" (user_type_id)');
        $this->addSql('CREATE TABLE user_type (id INT NOT NULL, user_type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE bookmark ADD CONSTRAINT FK_DA62921D9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE give_hotel_feedback ADD CONSTRAINT FK_FF08E90D9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE give_hotel_feedback ADD CONSTRAINT FK_FF08E90D3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE give_room_feedback ADD CONSTRAINT FK_82C7424A9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE give_room_feedback ADD CONSTRAINT FK_82C7424A54177093 FOREIGN KEY (room_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hotel_media ADD CONSTRAINT FK_89F86FC83243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hotel_media ADD CONSTRAINT FK_89F86FC8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hotel_promotion ADD CONSTRAINT FK_7F540C133243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hotel_promotion ADD CONSTRAINT FK_7F540C13139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hotel_partnership ADD CONSTRAINT FK_58D79C813243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hotel_partnership ADD CONSTRAINT FK_58D79C816AE7F85 FOREIGN KEY (partnership_id) REFERENCES partnership (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE partnership_user ADD CONSTRAINT FK_62B0C6D26AE7F85 FOREIGN KEY (partnership_id) REFERENCES partnership (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE partnership_user ADD CONSTRAINT FK_62B0C6D2A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation_contain ADD CONSTRAINT FK_2C7A4C4D54177093 FOREIGN KEY (room_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation_contain ADD CONSTRAINT FK_2C7A4C4DB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resto ADD CONSTRAINT FK_892155B13243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B296E3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_room_content ADD CONSTRAINT FK_A49594DA54177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_room_content ADD CONSTRAINT FK_A49594DAB052D3F1 FOREIGN KEY (room_content_id) REFERENCES room_content (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_bookmark ADD CONSTRAINT FK_7A8452D954177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_bookmark ADD CONSTRAINT FK_7A8452D992741D25 FOREIGN KEY (bookmark_id) REFERENCES bookmark (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D6499D419299 FOREIGN KEY (user_type_id) REFERENCES user_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE bookmark_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE give_hotel_feedback_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE give_room_feedback_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hotel_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE media_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE partnership_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE payment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE promotion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reservation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reservation_contain_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE resto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE room_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE room_content_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE room_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE user_type_id_seq CASCADE');
        $this->addSql('ALTER TABLE bookmark DROP CONSTRAINT FK_DA62921D9D86650F');
        $this->addSql('ALTER TABLE give_hotel_feedback DROP CONSTRAINT FK_FF08E90D9D86650F');
        $this->addSql('ALTER TABLE give_hotel_feedback DROP CONSTRAINT FK_FF08E90D3243BB18');
        $this->addSql('ALTER TABLE give_room_feedback DROP CONSTRAINT FK_82C7424A9D86650F');
        $this->addSql('ALTER TABLE give_room_feedback DROP CONSTRAINT FK_82C7424A54177093');
        $this->addSql('ALTER TABLE hotel_media DROP CONSTRAINT FK_89F86FC83243BB18');
        $this->addSql('ALTER TABLE hotel_media DROP CONSTRAINT FK_89F86FC8EA9FDD75');
        $this->addSql('ALTER TABLE hotel_promotion DROP CONSTRAINT FK_7F540C133243BB18');
        $this->addSql('ALTER TABLE hotel_promotion DROP CONSTRAINT FK_7F540C13139DF194');
        $this->addSql('ALTER TABLE hotel_partnership DROP CONSTRAINT FK_58D79C813243BB18');
        $this->addSql('ALTER TABLE hotel_partnership DROP CONSTRAINT FK_58D79C816AE7F85');
        $this->addSql('ALTER TABLE partnership_user DROP CONSTRAINT FK_62B0C6D26AE7F85');
        $this->addSql('ALTER TABLE partnership_user DROP CONSTRAINT FK_62B0C6D2A76ED395');
        $this->addSql('ALTER TABLE payment DROP CONSTRAINT FK_6D28840DB83297E7');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C849559D86650F');
        $this->addSql('ALTER TABLE reservation_contain DROP CONSTRAINT FK_2C7A4C4D54177093');
        $this->addSql('ALTER TABLE reservation_contain DROP CONSTRAINT FK_2C7A4C4DB83297E7');
        $this->addSql('ALTER TABLE resto DROP CONSTRAINT FK_892155B13243BB18');
        $this->addSql('ALTER TABLE room DROP CONSTRAINT FK_729F519B3243BB18');
        $this->addSql('ALTER TABLE room DROP CONSTRAINT FK_729F519B296E3073');
        $this->addSql('ALTER TABLE room_room_content DROP CONSTRAINT FK_A49594DA54177093');
        $this->addSql('ALTER TABLE room_room_content DROP CONSTRAINT FK_A49594DAB052D3F1');
        $this->addSql('ALTER TABLE room_bookmark DROP CONSTRAINT FK_7A8452D954177093');
        $this->addSql('ALTER TABLE room_bookmark DROP CONSTRAINT FK_7A8452D992741D25');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D6499D419299');
        $this->addSql('DROP TABLE bookmark');
        $this->addSql('DROP TABLE give_hotel_feedback');
        $this->addSql('DROP TABLE give_room_feedback');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE hotel_media');
        $this->addSql('DROP TABLE hotel_promotion');
        $this->addSql('DROP TABLE hotel_partnership');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE partnership');
        $this->addSql('DROP TABLE partnership_user');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_contain');
        $this->addSql('DROP TABLE resto');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_room_content');
        $this->addSql('DROP TABLE room_bookmark');
        $this->addSql('DROP TABLE room_content');
        $this->addSql('DROP TABLE room_type');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
