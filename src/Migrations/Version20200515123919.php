<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200515123919 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE recipient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_name VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL, recipient_email VARCHAR(255) NOT NULL, recipient_name VARCHAR(255) DEFAULT NULL, recipient_address VARCHAR(255) DEFAULT NULL, recipient_city VARCHAR(255) DEFAULT NULL, recipient_state VARCHAR(255) DEFAULT NULL, recipient_zip_code VARCHAR(255) DEFAULT NULL, recipient_country VARCHAR(255) DEFAULT NULL, gift_card_send_date DATETIME DEFAULT NULL, personal_message_name CLOB DEFAULT NULL, personal_message CLOB DEFAULT NULL, subscription_time DATETIME NOT NULL, card_phyiscal BOOLEAN NOT NULL, send_to_them BOOLEAN NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE recipient');
    }
}
