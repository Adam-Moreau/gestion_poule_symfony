<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230428140425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE couvaison (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin_couv DATE DEFAULT NULL, nbr_oeuf_debut INT NOT NULL, nbr_oeuf_perdu INT DEFAULT NULL, etat_couv TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poule (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, couvaison_id INT DEFAULT NULL, nom_poule VARCHAR(12) DEFAULT NULL, sexe_poule VARCHAR(10) DEFAULT NULL, photo_poule VARCHAR(100) DEFAULT NULL, race_poule VARCHAR(20) NOT NULL, colori_poule VARCHAR(25) NOT NULL, bague_poule TINYINT(1) NOT NULL, commentaire_poule VARCHAR(255) DEFAULT NULL, date_eclo DATE DEFAULT NULL, INDEX IDX_FA1FEB40FB88E14F (utilisateur_id), UNIQUE INDEX UNIQ_FA1FEB40A2AE4418 (couvaison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, mail_user VARCHAR(30) DEFAULT NULL, activ_user TINYINT(1) NOT NULL, nom VARCHAR(16) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB40FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB40A2AE4418 FOREIGN KEY (couvaison_id) REFERENCES couvaison (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB40FB88E14F');
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB40A2AE4418');
        $this->addSql('DROP TABLE couvaison');
        $this->addSql('DROP TABLE poule');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
