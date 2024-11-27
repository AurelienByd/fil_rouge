<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127104604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (ref_client VARCHAR(20) NOT NULL, nom_client VARCHAR(30) NOT NULL, adresse_livraison_client VARCHAR(50) NOT NULL, adresse_facturation_client VARCHAR(50) NOT NULL, contact_client VARCHAR(50) NOT NULL, coeff_client INT NOT NULL, cat_client JSON NOT NULL, date_inscr_client DATETIME NOT NULL, reduc_pour_client NUMERIC(6, 2) NOT NULL, mdp_client VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_C744045557D633D4 (contact_client), UNIQUE INDEX UNIQ_IDENTIFIER (ref_client, contact_client), PRIMARY KEY(ref_client)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client');
    }
}
