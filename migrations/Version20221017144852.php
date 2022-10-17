<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017144852 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_util VARCHAR(30) NOT NULL, mail_util VARCHAR(30) NOT NULL, mdp_util VARCHAR(40) NOT NULL, activ_util TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poule ADD couvaison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB40A2AE4418 FOREIGN KEY (couvaison_id) REFERENCES couvaison (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA1FEB40A2AE4418 ON poule (couvaison_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB40FB88E14F');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB40A2AE4418');
        $this->addSql('DROP INDEX UNIQ_FA1FEB40A2AE4418 ON poule');
        $this->addSql('ALTER TABLE poule DROP couvaison_id');
    }
}
