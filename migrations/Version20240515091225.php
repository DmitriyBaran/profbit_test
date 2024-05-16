<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515091225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE product (
             id INT AUTO_INCREMENT NOT NULL, 
             code SMALLINT NOT NULL, 
             name VARCHAR(255) NOT NULL,
             type ENUM('type-1', 'type-2', 'type-3') NOT NULL,
             price SMALLINT NOT NULL, 
             PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE product');
    }
}
