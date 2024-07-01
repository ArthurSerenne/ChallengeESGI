<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240629170551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE category ADD company_id INT NOT NULL');
        // $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('CREATE INDEX IDX_64C19C1979B1AD6 ON category (company_id)');
        // $this->addSql('ALTER TABLE devis ADD company_id INT NOT NULL');
        // $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('CREATE INDEX IDX_8B27C52B979B1AD6 ON devis (company_id)');
        // $this->addSql('ALTER TABLE facture ADD company_id INT NOT NULL');
        // $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('CREATE INDEX IDX_FE866410979B1AD6 ON facture (company_id)');
        // $this->addSql('ALTER TABLE produit ADD company_id INT NOT NULL');
        // $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('CREATE INDEX IDX_29A5EC27979B1AD6 ON produit (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE devis DROP CONSTRAINT FK_8B27C52B979B1AD6');
        $this->addSql('DROP INDEX IDX_8B27C52B979B1AD6');
        $this->addSql('ALTER TABLE devis DROP company_id');
        $this->addSql('ALTER TABLE produit DROP CONSTRAINT FK_29A5EC27979B1AD6');
        $this->addSql('DROP INDEX IDX_29A5EC27979B1AD6');
        $this->addSql('ALTER TABLE produit DROP company_id');
        $this->addSql('ALTER TABLE facture DROP CONSTRAINT FK_FE866410979B1AD6');
        $this->addSql('DROP INDEX IDX_FE866410979B1AD6');
        $this->addSql('ALTER TABLE facture DROP company_id');
        $this->addSql('ALTER TABLE category DROP CONSTRAINT FK_64C19C1979B1AD6');
        $this->addSql('DROP INDEX IDX_64C19C1979B1AD6');
        $this->addSql('ALTER TABLE category DROP company_id');
    }
}
