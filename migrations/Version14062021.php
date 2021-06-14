<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version14062021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post (
            id INT AUTO_INCREMENT NOT NULL, 
            author_id INT NOT NULL, 
            title VARCHAR(255) NOT NULL, 
            content VARCHAR(9999) NOT NULL, 
            image VARCHAR(255) DEFAULT NULL, 
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, 
            INDEX IDX_5A8A6C8DF675F31B (author_id), 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql('CREATE TABLE `user` (
            id INT AUTO_INCREMENT NOT NULL, 
            email VARCHAR(180) NOT NULL, 
            username VARCHAR(30) NOT NULL,
            roles JSON NOT NULL, 
            password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DF675F31B');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE `user`');
    }
}