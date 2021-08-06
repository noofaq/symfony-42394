<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806082443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE notification_user (notification_id INTEGER NOT NULL, user_id INTEGER NOT NULL, PRIMARY KEY(notification_id, user_id))');
        $this->addSql('CREATE INDEX IDX_35AF9D73EF1A9D84 ON notification_user (notification_id)');
        $this->addSql('CREATE INDEX IDX_35AF9D73A76ED395 ON notification_user (user_id)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE notification_user');
        $this->addSql('DROP TABLE "user"');
    }
}
