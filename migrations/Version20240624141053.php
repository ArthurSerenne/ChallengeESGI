<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624141053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE clients ADD adresse VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE clients ADD code_postal INT NOT NULL');
        $this->addSql('ALTER TABLE clients ADD ville VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE clients ADD pays VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE clients DROP adresse');
        $this->addSql('ALTER TABLE clients DROP code_postal');
        $this->addSql('ALTER TABLE clients DROP ville');
        $this->addSql('ALTER TABLE clients DROP pays');
    }
}
