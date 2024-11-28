<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241128085409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (num_commande INT NOT NULL, date_commande DATE NOT NULL, nb_exped_commande INT NOT NULL, total_ht NUMERIC(6, 2) NOT NULL, taxe_tva NUMERIC(6, 2) NOT NULL, total_ttc NUMERIC(6, 2) NOT NULL, total_commande NUMERIC(6, 2) NOT NULL, delai_paiement INT NOT NULL, mode_paiement VARCHAR(20) NOT NULL, penalite_retard NUMERIC(5, 2) NOT NULL, temps_conserv_docs DATE NOT NULL, PRIMARY KEY(num_commande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commande');
    }
}
