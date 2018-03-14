<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180314192153 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE record ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE record ADD CONSTRAINT FK_9B349F91A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_9B349F91A76ED395 ON record (user_id)');
        $this->addSql('ALTER TABLE train_type ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE train_type ADD CONSTRAINT FK_E535B1D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_E535B1D1A76ED395 ON train_type (user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE record DROP FOREIGN KEY FK_9B349F91A76ED395');
        $this->addSql('DROP INDEX IDX_9B349F91A76ED395 ON record');
        $this->addSql('ALTER TABLE record DROP user_id');
        $this->addSql('ALTER TABLE train_type DROP FOREIGN KEY FK_E535B1D1A76ED395');
        $this->addSql('DROP INDEX IDX_E535B1D1A76ED395 ON train_type');
        $this->addSql('ALTER TABLE train_type DROP user_id');
    }
}
