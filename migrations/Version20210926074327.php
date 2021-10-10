<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210926074327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_A436D2BCD41657D6');
        $this->addSql('DROP INDEX IDX_A436D2BCDCFBDDB7');
        $this->addSql('DROP INDEX IDX_A436D2BCA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__bord AS SELECT id, contribute_id, contribute_user_id, user_id, delete_flg, created_at, updated_at FROM bord');
        $this->addSql('DROP TABLE bord');
        $this->addSql('CREATE TABLE bord (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, contribute_id INTEGER DEFAULT NULL, contribute_user_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, delete_flg BOOLEAN DEFAULT NULL, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_A436D2BCD41657D6 FOREIGN KEY (contribute_id) REFERENCES contribute (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A436D2BCDCFBDDB7 FOREIGN KEY (contribute_user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A436D2BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO bord (id, contribute_id, contribute_user_id, user_id, delete_flg, created_at, updated_at) SELECT id, contribute_id, contribute_user_id, user_id, delete_flg, created_at, updated_at FROM __temp__bord');
        $this->addSql('DROP TABLE __temp__bord');
        $this->addSql('CREATE INDEX IDX_A436D2BCD41657D6 ON bord (contribute_id)');
        $this->addSql('CREATE INDEX IDX_A436D2BCDCFBDDB7 ON bord (contribute_user_id)');
        $this->addSql('CREATE INDEX IDX_A436D2BCA76ED395 ON bord (user_id)');
        $this->addSql('DROP INDEX IDX_E090DA21A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contribute AS SELECT id, user_id, textarea, created_at, updated_at FROM contribute');
        $this->addSql('DROP TABLE contribute');
        $this->addSql('CREATE TABLE contribute (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, user_id INTEGER DEFAULT NULL, textarea VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_E090DA21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO contribute (id, user_id, textarea, created_at, updated_at) SELECT id, user_id, textarea, created_at, updated_at FROM __temp__contribute');
        $this->addSql('DROP TABLE __temp__contribute');
        $this->addSql('CREATE INDEX IDX_E090DA21A76ED395 ON contribute (user_id)');
        $this->addSql('DROP INDEX IDX_B6BD307FD6B1F0E4');
        $this->addSql('DROP INDEX IDX_B6BD307F2130303A');
        $this->addSql('DROP INDEX IDX_B6BD307F29F6EE60');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, to_user_id, from_user_id, bord_id, message, created_at, updated_at, delete_flg FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, to_user_id INTEGER DEFAULT NULL, from_user_id INTEGER DEFAULT NULL, bord_id INTEGER DEFAULT NULL, message VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , delete_flg BOOLEAN DEFAULT NULL, CONSTRAINT FK_B6BD307F29F6EE60 FOREIGN KEY (to_user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B6BD307F2130303A FOREIGN KEY (from_user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B6BD307FD6B1F0E4 FOREIGN KEY (bord_id) REFERENCES bord (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO message (id, to_user_id, from_user_id, bord_id, message, created_at, updated_at, delete_flg) SELECT id, to_user_id, from_user_id, bord_id, message, created_at, updated_at, delete_flg FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307FD6B1F0E4 ON message (bord_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F2130303A ON message (from_user_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F29F6EE60 ON message (to_user_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, password, email, is_active, image, age, area, sex, look FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, age INTEGER DEFAULT NULL, area VARCHAR(255) DEFAULT NULL, sex VARCHAR(255) DEFAULT NULL, look VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, username, password, email, is_active, image, age, area, sex, look) SELECT id, username, password, email, is_active, image, age, area, sex, look FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_A436D2BCD41657D6');
        $this->addSql('DROP INDEX IDX_A436D2BCDCFBDDB7');
        $this->addSql('DROP INDEX IDX_A436D2BCA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__bord AS SELECT id, contribute_id, contribute_user_id, user_id, created_at, updated_at, delete_flg FROM bord');
        $this->addSql('DROP TABLE bord');
        $this->addSql('CREATE TABLE bord (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, delete_flg BOOLEAN DEFAULT NULL, contribute_id INTEGER DEFAULT NULL, contribute_user_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO bord (id, contribute_id, contribute_user_id, user_id, created_at, updated_at, delete_flg) SELECT id, contribute_id, contribute_user_id, user_id, created_at, updated_at, delete_flg FROM __temp__bord');
        $this->addSql('DROP TABLE __temp__bord');
        $this->addSql('CREATE INDEX IDX_A436D2BCD41657D6 ON bord (contribute_id)');
        $this->addSql('CREATE INDEX IDX_A436D2BCDCFBDDB7 ON bord (contribute_user_id)');
        $this->addSql('CREATE INDEX IDX_A436D2BCA76ED395 ON bord (user_id)');
        $this->addSql('DROP INDEX IDX_E090DA21A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contribute AS SELECT id, user_id, textarea, created_at, updated_at FROM contribute');
        $this->addSql('DROP TABLE contribute');
        $this->addSql('CREATE TABLE contribute (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, user_id INTEGER DEFAULT NULL, textarea VARCHAR(255) DEFAULT NULL COLLATE BINARY, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO contribute (id, user_id, textarea, created_at, updated_at) SELECT id, user_id, textarea, created_at, updated_at FROM __temp__contribute');
        $this->addSql('DROP TABLE __temp__contribute');
        $this->addSql('CREATE INDEX IDX_E090DA21A76ED395 ON contribute (user_id)');
        $this->addSql('DROP INDEX IDX_B6BD307F29F6EE60');
        $this->addSql('DROP INDEX IDX_B6BD307F2130303A');
        $this->addSql('DROP INDEX IDX_B6BD307FD6B1F0E4');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, to_user_id, from_user_id, bord_id, message, created_at, updated_at, delete_flg FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, to_user_id INTEGER DEFAULT NULL, from_user_id INTEGER DEFAULT NULL, bord_id INTEGER DEFAULT NULL, message VARCHAR(255) DEFAULT NULL COLLATE BINARY, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , delete_flg BOOLEAN DEFAULT NULL)');
        $this->addSql('INSERT INTO message (id, to_user_id, from_user_id, bord_id, message, created_at, updated_at, delete_flg) SELECT id, to_user_id, from_user_id, bord_id, message, created_at, updated_at, delete_flg FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307F29F6EE60 ON message (to_user_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F2130303A ON message (from_user_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FD6B1F0E4 ON message (bord_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, username, age, password, email, area, image, sex, look, is_active FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, username VARCHAR(255) DEFAULT NULL COLLATE BINARY, age INTEGER DEFAULT NULL, password VARCHAR(255) DEFAULT NULL COLLATE BINARY, email VARCHAR(255) DEFAULT NULL COLLATE BINARY, area VARCHAR(255) DEFAULT NULL COLLATE BINARY, image VARCHAR(255) DEFAULT NULL COLLATE BINARY, sex VARCHAR(255) DEFAULT NULL COLLATE BINARY, look VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, username, age, password, email, area, image, sex, look, is_active) SELECT id, username, age, password, email, area, image, sex, look, is_active FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
