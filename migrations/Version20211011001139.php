<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211011001139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91EF675F31B');
        $this->addSql('DROP INDEX IDX_1931861AF675F31B ON trick');
        $this->addSql('ALTER TABLE trick CHANGE author_id author INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_1931861ABDAFD8C8 FOREIGN KEY (author) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_1931861ABDAFD8C8 ON trick (author)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Trick DROP FOREIGN KEY FK_1931861ABDAFD8C8');
        $this->addSql('DROP INDEX IDX_1931861ABDAFD8C8 ON Trick');
        $this->addSql('ALTER TABLE Trick CHANGE author author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Trick ADD CONSTRAINT FK_D8F0A91EF675F31B FOREIGN KEY (author_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1931861AF675F31B ON Trick (author_id)');
    }
}
