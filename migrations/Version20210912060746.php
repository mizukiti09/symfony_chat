<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210912060746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_E090DA21A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contribute AS SELECT id, user_id, textarea, created_at, updated_at FROM contribute');
        $this->addSql('DROP TABLE contribute');
        $this->addSql('CREATE TABLE contribute (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, textarea VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_E090DA21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO contribute (id, user_id, textarea, created_at, updated_at) SELECT id, user_id, textarea, created_at, updated_at FROM __temp__contribute');
        $this->addSql('DROP TABLE __temp__contribute');
        $this->addSql('CREATE INDEX IDX_E090DA21A76ED395 ON contribute (user_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D64935C246D5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, password, email, is_active, image, age, area, sex, look FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, is_active BOOLEAN NOT NULL, image VARCHAR(255) NOT NULL COLLATE BINARY, age INTEGER DEFAULT NULL, area VARCHAR(255) DEFAULT NULL, sex VARCHAR(255) DEFAULT NULL, look VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, username, password, email, is_active, image, age, area, sex, look) SELECT id, username, password, email, is_active, image, age, area, sex, look FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64935C246D5 ON user (password)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_E090DA21A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contribute AS SELECT id, user_id, textarea, created_at, updated_at FROM contribute');
        $this->addSql('DROP TABLE contribute');
        $this->addSql('CREATE TABLE contribute (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, textarea VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO contribute (id, user_id, textarea, created_at, updated_at) SELECT id, user_id, textarea, created_at, updated_at FROM __temp__contribute');
        $this->addSql('DROP TABLE __temp__contribute');
        $this->addSql('CREATE INDEX IDX_E090DA21A76ED395 ON contribute (user_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D64935C246D5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, age, password, email, area, image, sex, look, is_active FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, age INTEGER DEFAULT NULL, area VARCHAR(255) DEFAULT NULL COLLATE BINARY, sex VARCHAR(255) DEFAULT NULL COLLATE BINARY, look VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO user (id, username, age, password, email, area, image, sex, look, is_active) SELECT id, username, age, password, email, area, image, sex, look, is_active FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64935C246D5 ON user (password)');
    }
}
