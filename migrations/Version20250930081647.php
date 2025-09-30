<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250930081647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE editor ADD ca_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE editor ADD CONSTRAINT FK_CCF1F1BA22A76C4 FOREIGN KEY (ca_id) REFERENCES gameconsoles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CCF1F1BA22A76C4 ON editor (ca_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE editor DROP CONSTRAINT FK_CCF1F1BA22A76C4');
        $this->addSql('DROP INDEX UNIQ_CCF1F1BA22A76C4');
        $this->addSql('ALTER TABLE editor DROP ca_id');
    }
}
