<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230729103801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resto ALTER resto_url_img TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE room ALTER room_url_img TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE room_content ALTER content_url_img TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE "user" DROP birthdate');
        $this->addSql('ALTER TABLE "user" ALTER profil_url_img TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE room_content ALTER content_url_img TYPE TEXT');
        $this->addSql('ALTER TABLE room ALTER room_url_img TYPE TEXT');
        $this->addSql('ALTER TABLE resto ALTER resto_url_img TYPE TEXT');
        $this->addSql('ALTER TABLE "user" ADD birthdate TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE "user" ALTER profil_url_img TYPE TEXT');
    }
}
