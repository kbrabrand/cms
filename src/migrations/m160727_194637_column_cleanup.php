<?php

namespace craft\app\migrations;

use Craft;
use craft\app\db\Migration;
use craft\app\helpers\Migration as MigrationHelper;
use yii\db\Schema;

/**
 * m160727_194637_column_cleanup migration.
 */
class m160727_194637_column_cleanup extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Disable FK checks
        $this->execute('SET FOREIGN_KEY_CHECKS = 0;');

        // Normalize the sortOrder columns
        $sortOrderTables = [
            '{{%entrytypes}}',
            '{{%fieldlayoutfields}}',
            '{{%fieldlayouttabs}}',
            '{{%locales}}',
            '{{%matrixblocks}}',
            '{{%matrixblocktypes}}',
            '{{%relations}}',
            '{{%routes}}',
            '{{%volumes}}',
            '{{%widgets}}',
        ];

        $type = $this->smallInteger()->unsigned();

        foreach ($sortOrderTables as $table) {
            $this->alterColumn($table, 'sortOrder', $type);
        }

        $this->alterColumn('{{%assetindexdata}}', 'volumeId', $this->integer()->notNull());
        $this->alterColumn('{{%assetindexdata}}', 'offset', $this->integer()->notNull());
        $this->alterColumn('{{%assetindexdata}}', 'recordId', $this->integer());
        $this->alterColumn('{{%assettransforms}}', 'height', $this->integer()->unsigned(), null, 'width');
        $this->alterColumn('{{%assettransforms}}', 'width', $this->integer()->unsigned());
        $this->alterColumn('{{%deprecationerrors}}', 'template', $this->string(500));
        $this->alterColumn('{{%emailmessages}}', 'key', $this->string()->notNull());
        $this->alterColumn('{{%emailmessages}}', 'subject', $this->text()->notNull());
        $this->alterColumn('{{%globalsets}}', 'fieldLayoutId', $this->integer());
        $this->alterColumn('{{%routes}}', 'template', $this->string(500)->notNull());
        $this->alterColumn('{{%structureelements}}', 'root', $this->integer()->unsigned());
        $this->alterColumn('{{%structureelements}}', 'lft', $this->integer()->notNull()->unsigned());
        $this->alterColumn('{{%structureelements}}', 'rgt', $this->integer()->notNull()->unsigned());
        $this->alterColumn('{{%taggroups}}', 'fieldLayoutId', $this->integer());
        $this->alterColumn('{{%tokens}}', 'usageLimit', $this->smallInteger()->unsigned());
        $this->alterColumn('{{%tokens}}', 'usageCount', $this->smallInteger()->unsigned());
        $this->alterColumn('{{%users}}', 'invalidLoginCount', $this->smallInteger()->unsigned());

        // Re-enable FK checks
        $this->execute('SET FOREIGN_KEY_CHECKS = 1;');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m160727_194637_column_cleanup cannot be reverted.\n";
        return false;
    }
}