<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240701194835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE clients_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE devis_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE facture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE ligne_devis_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE ligne_facture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE produit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        // $this->addSql('CREATE TABLE category (id INT NOT NULL, company_id INT NOT NULL, category VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_64C19C1979B1AD6 ON category (company_id)');
        // $this->addSql('CREATE TABLE clients (id INT NOT NULL, company_id INT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone DOUBLE PRECISION NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_C82E74979B1AD6 ON clients (company_id)');
        // $this->addSql('CREATE TABLE company (id INT NOT NULL, user_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, siret VARCHAR(14) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_4FBF094F9D86650F ON company (user_id_id)');
        // $this->addSql('CREATE TABLE devis (id INT NOT NULL, client_id INT NOT NULL, company_id INT NOT NULL, date_devis TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, total_ht NUMERIC(10, 2) NOT NULL, total_ttc NUMERIC(10, 2) NOT NULL, total_tva NUMERIC(10, 2) NOT NULL, remise NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_8B27C52B19EB6921 ON devis (client_id)');
        // $this->addSql('CREATE INDEX IDX_8B27C52B979B1AD6 ON devis (company_id)');
        // $this->addSql('CREATE TABLE facture (id INT NOT NULL, devis_id INT NOT NULL, client_id INT NOT NULL, company_id INT NOT NULL, date_facture TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, total_ht NUMERIC(10, 2) NOT NULL, total_ttc NUMERIC(10, 2) NOT NULL, total_tva NUMERIC(10, 2) NOT NULL, remise NUMERIC(10, 2) NOT NULL, date_echeance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, statut_paiement VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_FE86641041DEFADA ON facture (devis_id)');
        // $this->addSql('CREATE INDEX IDX_FE86641019EB6921 ON facture (client_id)');
        // $this->addSql('CREATE INDEX IDX_FE866410979B1AD6 ON facture (company_id)');
        // $this->addSql('CREATE TABLE ligne_devis (id INT NOT NULL, devis_id INT NOT NULL, produit_id INT NOT NULL, quantite INT NOT NULL, prix_ht NUMERIC(10, 2) NOT NULL, prix_ttc NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_888B2F1B41DEFADA ON ligne_devis (devis_id)');
        // $this->addSql('CREATE INDEX IDX_888B2F1BF347EFB ON ligne_devis (produit_id)');
        // $this->addSql('CREATE TABLE ligne_facture (id INT NOT NULL, facture_id INT NOT NULL, produit_id INT NOT NULL, quantite INT NOT NULL, prix_ht NUMERIC(10, 2) NOT NULL, prix_ttc NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_611F5A297F2DEE08 ON ligne_facture (facture_id)');
        // $this->addSql('CREATE INDEX IDX_611F5A29F347EFB ON ligne_facture (produit_id)');
        // $this->addSql('CREATE TABLE produit (id INT NOT NULL, company_id INT NOT NULL, category_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_29A5EC27979B1AD6 ON produit (company_id)');
        // $this->addSql('CREATE INDEX IDX_29A5EC2712469DE2 ON produit (category_id)');
        // $this->addSql('CREATE TABLE "user" (id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified BOOLEAN NOT NULL, gender VARCHAR(255) NOT NULL, theme VARCHAR(255) DEFAULT \'original\' NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        // $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        // $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        // $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        // $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        // $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        // $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        // $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        // $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
        //     BEGIN
        //         PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
        //         RETURN NEW;
        //     END;
        // $$ LANGUAGE plpgsql;');
        // $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        // $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        // $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641041DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641019EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE ligne_devis ADD CONSTRAINT FK_888B2F1B41DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE ligne_devis ADD CONSTRAINT FK_888B2F1BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE ligne_facture ADD CONSTRAINT FK_611F5A297F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE ligne_facture ADD CONSTRAINT FK_611F5A29F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE clients_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE devis_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE facture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ligne_devis_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ligne_facture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE produit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE category DROP CONSTRAINT FK_64C19C1979B1AD6');
        $this->addSql('ALTER TABLE clients DROP CONSTRAINT FK_C82E74979B1AD6');
        $this->addSql('ALTER TABLE company DROP CONSTRAINT FK_4FBF094F9D86650F');
        $this->addSql('ALTER TABLE devis DROP CONSTRAINT FK_8B27C52B19EB6921');
        $this->addSql('ALTER TABLE devis DROP CONSTRAINT FK_8B27C52B979B1AD6');
        $this->addSql('ALTER TABLE facture DROP CONSTRAINT FK_FE86641041DEFADA');
        $this->addSql('ALTER TABLE facture DROP CONSTRAINT FK_FE86641019EB6921');
        $this->addSql('ALTER TABLE facture DROP CONSTRAINT FK_FE866410979B1AD6');
        $this->addSql('ALTER TABLE ligne_devis DROP CONSTRAINT FK_888B2F1B41DEFADA');
        $this->addSql('ALTER TABLE ligne_devis DROP CONSTRAINT FK_888B2F1BF347EFB');
        $this->addSql('ALTER TABLE ligne_facture DROP CONSTRAINT FK_611F5A297F2DEE08');
        $this->addSql('ALTER TABLE ligne_facture DROP CONSTRAINT FK_611F5A29F347EFB');
        $this->addSql('ALTER TABLE produit DROP CONSTRAINT FK_29A5EC27979B1AD6');
        $this->addSql('ALTER TABLE produit DROP CONSTRAINT FK_29A5EC2712469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE ligne_devis');
        $this->addSql('DROP TABLE ligne_facture');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
