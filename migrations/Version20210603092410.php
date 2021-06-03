<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210603092410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bill ADD owner_id INT NOT NULL, ADD customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E37E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E39395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_7A2119E37E3C61F9 ON bill (owner_id)');
        $this->addSql('CREATE INDEX IDX_7A2119E39395C3F3 ON bill (customer_id)');
        $this->addSql('ALTER TABLE bill_status ADD bill_id INT NOT NULL');
        $this->addSql('ALTER TABLE bill_status ADD CONSTRAINT FK_6C812B0A1A8C12F5 FOREIGN KEY (bill_id) REFERENCES bill (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C812B0A1A8C12F5 ON bill_status (bill_id)');
        $this->addSql('ALTER TABLE billing_method ADD rate_id INT NOT NULL, ADD bill_id INT NOT NULL');
        $this->addSql('ALTER TABLE billing_method ADD CONSTRAINT FK_1B831930BC999F9F FOREIGN KEY (rate_id) REFERENCES rate (id)');
        $this->addSql('ALTER TABLE billing_method ADD CONSTRAINT FK_1B8319301A8C12F5 FOREIGN KEY (bill_id) REFERENCES bill (id)');
        $this->addSql('CREATE INDEX IDX_1B831930BC999F9F ON billing_method (rate_id)');
        $this->addSql('CREATE INDEX IDX_1B8319301A8C12F5 ON billing_method (bill_id)');
        $this->addSql('ALTER TABLE diligence ADD expertise_id INT DEFAULT NULL, ADD bill_id INT NOT NULL');
        $this->addSql('ALTER TABLE diligence ADD CONSTRAINT FK_5D64E0609D5B92F9 FOREIGN KEY (expertise_id) REFERENCES expertise (id)');
        $this->addSql('ALTER TABLE diligence ADD CONSTRAINT FK_5D64E0601A8C12F5 FOREIGN KEY (bill_id) REFERENCES bill (id)');
        $this->addSql('CREATE INDEX IDX_5D64E0609D5B92F9 ON diligence (expertise_id)');
        $this->addSql('CREATE INDEX IDX_5D64E0601A8C12F5 ON diligence (bill_id)');
        $this->addSql('ALTER TABLE expertise ADD expertise_list_id INT NOT NULL');
        $this->addSql('ALTER TABLE expertise ADD CONSTRAINT FK_229ADF8B1DC05497 FOREIGN KEY (expertise_list_id) REFERENCES expertise_list (id)');
        $this->addSql('CREATE INDEX IDX_229ADF8B1DC05497 ON expertise (expertise_list_id)');
        $this->addSql('ALTER TABLE folder ADD customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE folder ADD CONSTRAINT FK_ECA209CD9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_ECA209CD9395C3F3 ON folder (customer_id)');
        $this->addSql('ALTER TABLE news ADD news_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD399503B732BAD FOREIGN KEY (news_category_id) REFERENCES news_category (id)');
        $this->addSql('CREATE INDEX IDX_1DD399503B732BAD ON news (news_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E37E3C61F9');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E39395C3F3');
        $this->addSql('DROP INDEX IDX_7A2119E37E3C61F9 ON bill');
        $this->addSql('DROP INDEX IDX_7A2119E39395C3F3 ON bill');
        $this->addSql('ALTER TABLE bill DROP owner_id, DROP customer_id');
        $this->addSql('ALTER TABLE bill_status DROP FOREIGN KEY FK_6C812B0A1A8C12F5');
        $this->addSql('DROP INDEX UNIQ_6C812B0A1A8C12F5 ON bill_status');
        $this->addSql('ALTER TABLE bill_status DROP bill_id');
        $this->addSql('ALTER TABLE billing_method DROP FOREIGN KEY FK_1B831930BC999F9F');
        $this->addSql('ALTER TABLE billing_method DROP FOREIGN KEY FK_1B8319301A8C12F5');
        $this->addSql('DROP INDEX IDX_1B831930BC999F9F ON billing_method');
        $this->addSql('DROP INDEX IDX_1B8319301A8C12F5 ON billing_method');
        $this->addSql('ALTER TABLE billing_method DROP rate_id, DROP bill_id');
        $this->addSql('ALTER TABLE diligence DROP FOREIGN KEY FK_5D64E0609D5B92F9');
        $this->addSql('ALTER TABLE diligence DROP FOREIGN KEY FK_5D64E0601A8C12F5');
        $this->addSql('DROP INDEX IDX_5D64E0609D5B92F9 ON diligence');
        $this->addSql('DROP INDEX IDX_5D64E0601A8C12F5 ON diligence');
        $this->addSql('ALTER TABLE diligence DROP expertise_id, DROP bill_id');
        $this->addSql('ALTER TABLE expertise DROP FOREIGN KEY FK_229ADF8B1DC05497');
        $this->addSql('DROP INDEX IDX_229ADF8B1DC05497 ON expertise');
        $this->addSql('ALTER TABLE expertise DROP expertise_list_id');
        $this->addSql('ALTER TABLE folder DROP FOREIGN KEY FK_ECA209CD9395C3F3');
        $this->addSql('DROP INDEX IDX_ECA209CD9395C3F3 ON folder');
        $this->addSql('ALTER TABLE folder DROP customer_id');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD399503B732BAD');
        $this->addSql('DROP INDEX IDX_1DD399503B732BAD ON news');
        $this->addSql('ALTER TABLE news DROP news_category_id');
    }
}
