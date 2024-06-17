<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529102932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture_produit DROP CONSTRAINT fk_61424d7e7f2dee08');
        $this->addSql('ALTER TABLE facture_produit DROP CONSTRAINT fk_61424d7ef347efb');
        $this->addSql('DROP TABLE facture_produit');
        $this->addSql('ALTER TABLE facture ADD devis_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD total_ht NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE facture ADD total_ttc NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE facture ADD total_tva NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE facture ADD remise NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE facture ADD date_echeance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE facture ADD statut_paiement VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE facture DROP cout_total');
        $this->addSql('ALTER TABLE facture RENAME COLUMN date TO date_facture');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641041DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641019EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FE86641041DEFADA ON facture (devis_id)');
        $this->addSql('CREATE INDEX IDX_FE86641019EB6921 ON facture (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE facture_produit (facture_id INT NOT NULL, produit_id INT NOT NULL, PRIMARY KEY(facture_id, produit_id))');
        $this->addSql('CREATE INDEX idx_61424d7ef347efb ON facture_produit (produit_id)');
        $this->addSql('CREATE INDEX idx_61424d7e7f2dee08 ON facture_produit (facture_id)');
        $this->addSql('ALTER TABLE facture_produit ADD CONSTRAINT fk_61424d7e7f2dee08 FOREIGN KEY (facture_id) REFERENCES facture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture_produit ADD CONSTRAINT fk_61424d7ef347efb FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture DROP CONSTRAINT FK_FE86641041DEFADA');
        $this->addSql('ALTER TABLE facture DROP CONSTRAINT FK_FE86641019EB6921');
        $this->addSql('DROP INDEX IDX_FE86641041DEFADA');
        $this->addSql('DROP INDEX IDX_FE86641019EB6921');
        $this->addSql('ALTER TABLE facture ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE facture ADD cout_total DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE facture DROP devis_id');
        $this->addSql('ALTER TABLE facture DROP client_id');
        $this->addSql('ALTER TABLE facture DROP date_facture');
        $this->addSql('ALTER TABLE facture DROP total_ht');
        $this->addSql('ALTER TABLE facture DROP total_ttc');
        $this->addSql('ALTER TABLE facture DROP total_tva');
        $this->addSql('ALTER TABLE facture DROP remise');
        $this->addSql('ALTER TABLE facture DROP date_echeance');
        $this->addSql('ALTER TABLE facture DROP statut_paiement');
    }
}
