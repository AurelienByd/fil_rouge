<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241129105235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD num_commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410F80F63BC FOREIGN KEY (num_commande_id) REFERENCES commande (num_commande)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410F80F63BC ON facture (num_commande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410F80F63BC');
        $this->addSql('DROP INDEX UNIQ_FE866410F80F63BC ON facture');
        $this->addSql('ALTER TABLE facture DROP num_commande_id');
    }
}
