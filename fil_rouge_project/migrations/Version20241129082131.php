<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241129082131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_de_livraison ADD num_commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE bon_de_livraison ADD CONSTRAINT FK_2F9D665BF80F63BC FOREIGN KEY (num_commande_id) REFERENCES commande (num_commande)');
        $this->addSql('CREATE INDEX IDX_2F9D665BF80F63BC ON bon_de_livraison (num_commande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_de_livraison DROP FOREIGN KEY FK_2F9D665BF80F63BC');
        $this->addSql('DROP INDEX IDX_2F9D665BF80F63BC ON bon_de_livraison');
        $this->addSql('ALTER TABLE bon_de_livraison DROP num_commande_id');
    }
}
