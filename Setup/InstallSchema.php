<?php

namespace Veriteworks\Helloimg\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /*
         * Drop tables if exists
         */
        $installer->getConnection()->dropTable($installer->getTable('veriteworks_helloimg_img'));

        $table = $installer->getConnection()->newTable(
            $installer->getTable('veriteworks_helloimg_img')
        )->addColumn(
            'img_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Image ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Image name'
        )->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Image'
        )->addColumn(
            'date_to',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            ['nullable' => true],
            [],
            'Date to'
        )->addColumn(
            'date_from',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            ['nullable' => true],
            [],
            'Date from'
        );

        $installer->getConnection()->createTable($table);

    }
}