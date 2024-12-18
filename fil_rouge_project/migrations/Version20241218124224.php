<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218124224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE selectionne DROP FOREIGN KEY FK_40B048579F191E5');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27490BE348');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278E79F48C');
        $this->addSql('DROP TABLE produit');
        $this->addSql('ALTER TABLE envoie DROP produit_id');
        $this->addSql('DROP INDEX UNIQ_FE866410F80F63BC ON facture');
        $this->addSql('ALTER TABLE facture ADD id INT AUTO_INCREMENT NOT NULL, DROP num_commande_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE fournisseur ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE rubrique ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE selectionne DROP FOREIGN KEY FK_40B048576AB16864');
        $this->addSql('DROP INDEX IDX_40B048576AB16864 ON selectionne');
        $this->addSql('DROP INDEX IDX_40B048579F191E5 ON selectionne');
        $this->addSql('ALTER TABLE selectionne ADD id INT AUTO_INCREMENT NOT NULL, ADD client_id INT NOT NULL, DROP ref_produit_id, DROP ref_client_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE selectionne ADD CONSTRAINT FK_40B0485719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_40B0485719EB6921 ON selectionne (client_id)');
        $this->addSql('ALTER TABLE sous_rubrique DROP FOREIGN KEY FK_87EA3D29F5B3232C');
        $this->addSql('DROP INDEX IDX_87EA3D29F5B3232C ON sous_rubrique');
        $this->addSql('ALTER TABLE sous_rubrique ADD id INT AUTO_INCREMENT NOT NULL, ADD rubrique_id INT NOT NULL, DROP nom_rubrique_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE sous_rubrique ADD CONSTRAINT FK_87EA3D293BD38833 FOREIGN KEY (rubrique_id) REFERENCES rubrique (id)');
        $this->addSql('CREATE INDEX IDX_87EA3D293BD38833 ON sous_rubrique (rubrique_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (ref_produit VARCHAR(5) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom_ss_rubrique_id VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ref_fournisseur_produit_id VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom_produit VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, descr_produit VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix_achat_produit NUMERIC(6, 2) NOT NULL, photo_produit VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix_vente_produit_ht NUMERIC(6, 2) NOT NULL, stock_produit INT NOT NULL, valide_produit TINYINT(1) NOT NULL, active_produit TINYINT(1) NOT NULL, INDEX IDX_29A5EC278E79F48C (ref_fournisseur_produit_id), INDEX IDX_29A5EC27490BE348 (nom_ss_rubrique_id), PRIMARY KEY(ref_produit)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27490BE348 FOREIGN KEY (nom_ss_rubrique_id) REFERENCES sous_rubrique (nom_ss_rubrique) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278E79F48C FOREIGN KEY (ref_fournisseur_produit_id) REFERENCES fournisseur (ref_fournisseur_produit) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE envoie ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE sous_rubrique MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE sous_rubrique DROP FOREIGN KEY FK_87EA3D293BD38833');
        $this->addSql('DROP INDEX IDX_87EA3D293BD38833 ON sous_rubrique');
        $this->addSql('DROP INDEX `PRIMARY` ON sous_rubrique');
        $this->addSql('ALTER TABLE sous_rubrique ADD nom_rubrique_id VARCHAR(20) NOT NULL, DROP id, DROP rubrique_id');
        $this->addSql('ALTER TABLE sous_rubrique ADD CONSTRAINT FK_87EA3D29F5B3232C FOREIGN KEY (nom_rubrique_id) REFERENCES rubrique (nom_rubrique) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_87EA3D29F5B3232C ON sous_rubrique (nom_rubrique_id)');
        $this->addSql('ALTER TABLE sous_rubrique ADD PRIMARY KEY (nom_ss_rubrique)');
        $this->addSql('ALTER TABLE selectionne MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE selectionne DROP FOREIGN KEY FK_40B0485719EB6921');
        $this->addSql('DROP INDEX IDX_40B0485719EB6921 ON selectionne');
        $this->addSql('DROP INDEX `PRIMARY` ON selectionne');
        $this->addSql('ALTER TABLE selectionne ADD ref_produit_id VARCHAR(5) NOT NULL, ADD ref_client_id VARCHAR(20) NOT NULL, DROP id, DROP client_id');
        $this->addSql('ALTER TABLE selectionne ADD CONSTRAINT FK_40B048576AB16864 FOREIGN KEY (ref_client_id) REFERENCES client (ref_client) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE selectionne ADD CONSTRAINT FK_40B048579F191E5 FOREIGN KEY (ref_produit_id) REFERENCES produit (ref_produit) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_40B048576AB16864 ON selectionne (ref_client_id)');
        $this->addSql('CREATE INDEX IDX_40B048579F191E5 ON selectionne (ref_produit_id)');
        $this->addSql('ALTER TABLE selectionne ADD PRIMARY KEY (ref_produit_id, ref_client_id)');
        $this->addSql('ALTER TABLE rubrique MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON rubrique');
        $this->addSql('ALTER TABLE rubrique DROP id');
        $this->addSql('ALTER TABLE rubrique ADD PRIMARY KEY (nom_rubrique)');
        $this->addSql('ALTER TABLE facture MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON facture');
        $this->addSql('ALTER TABLE facture ADD num_commande_id INT NOT NULL, DROP id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410F80F63BC ON facture (num_commande_id)');
        $this->addSql('ALTER TABLE facture ADD PRIMARY KEY (num_facture)');
        $this->addSql('ALTER TABLE fournisseur MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON fournisseur');
        $this->addSql('ALTER TABLE fournisseur DROP id');
        $this->addSql('ALTER TABLE fournisseur ADD PRIMARY KEY (ref_fournisseur_produit)');
    }
}
