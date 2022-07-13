<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220321164621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE approvisionnement (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, UNIQUE INDEX UNIQ_516C3FAAC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, approvisionnement_id INT NOT NULL, nom VARCHAR(255) NOT NULL, stock_restant INT NOT NULL, quantité_globale INT DEFAULT NULL, INDEX IDX_41405E39AE741A98 (approvisionnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, UNIQUE INDEX UNIQ_D499BFF6C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, demarrage DATETIME NOT NULL, delai INT NOT NULL, fin DATETIME DEFAULT NULL, budget BIGINT NOT NULL, est_termine TINYINT(1) DEFAULT 0, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, planning_id INT NOT NULL, intitule VARCHAR(255) NOT NULL, debut_prev DATETIME NOT NULL, delai INT NOT NULL, cout_base BIGINT NOT NULL, debut_reel DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, cout_reel BIGINT DEFAULT NULL, est_realise TINYINT(1) DEFAULT 0, INDEX IDX_938720753D865311 (planning_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE approvisionnement ADD CONSTRAINT FK_516C3FAAC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E39AE741A98 FOREIGN KEY (approvisionnement_id) REFERENCES approvisionnement (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_938720753D865311 FOREIGN KEY (planning_id) REFERENCES planning (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E39AE741A98');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_938720753D865311');
        $this->addSql('ALTER TABLE approvisionnement DROP FOREIGN KEY FK_516C3FAAC18272');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6C18272');
        $this->addSql('DROP TABLE approvisionnement');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE tache');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
