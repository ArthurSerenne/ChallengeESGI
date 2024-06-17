<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529101418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE ligne_devis_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE ligne_devis (id INT NOT NULL, devis_id INT NOT NULL, produit_id INT NOT NULL, quantite INT NOT NULL, prix_ht NUMERIC(10, 2) NOT NULL, prix_ttc NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_888B2F1B41DEFADA ON ligne_devis (devis_id)');
        $this->addSql('CREATE INDEX IDX_888B2F1BF347EFB ON ligne_devis (produit_id)');
        $this->addSql('ALTER TABLE ligne_devis ADD CONSTRAINT FK_888B2F1B41DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ligne_devis ADD CONSTRAINT FK_888B2F1BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE ligne_devis_id_seq CASCADE');
        $this->addSql('ALTER TABLE ligne_devis DROP CONSTRAINT FK_888B2F1B41DEFADA');
        $this->addSql('ALTER TABLE ligne_devis DROP CONSTRAINT FK_888B2F1BF347EFB');
        $this->addSql('DROP TABLE ligne_devis');
    }
}
