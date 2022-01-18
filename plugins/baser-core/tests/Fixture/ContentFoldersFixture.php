<?php
declare(strict_types=1);

namespace BaserCore\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContentFolder Fixture
 */
class ContentFoldersFixture extends TestFixture
{

    /**
     * Import
     *
     * @var array
     */
    public $import = ['table' => 'content_folders'];

    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                // NOTE: contentFixtureのbaserCMSサンプル
                'id' => '1',
                'folder_template' => 'baserCMSサンプル',
                'page_template' => '',
                'created' => '2016-08-10 02:17:28',
                'modified' => null
            ],
            [
                // NOTE: contentFixtureのサービス
                'id' => '4',
                'folder_template' => 'サービス',
                'page_template' => '',
                'created' => '2016-08-10 02:17:28',
                'modified' => null
            ],
            [
                // NOTE: contentFixtureの削除済みフォルダー(親)
                'id' => '10',
                'folder_template' => '削除済みフォルダー(親)',
                'page_template' => '',
                'created' => '2016-08-10 02:17:28',
                'modified' => null
            ],
            [
                // NOTE: contentFixtureの削除済みフォルダー(親)
                'id' => '11',
                'folder_template' => '削除済みフォルダー(子)',
                'page_template' => '',
                'created' => '2016-08-10 02:17:28',
                'modified' => null
            ],
            [
                // NOTE ucmitz: contentFixtureのtestEdit
                'id' => '15',
                'folder_template' => 'testEdit',
                'page_template' => '',
                'created' => '2016-08-10 02:17:28',
                'modified' => null
            ],
            [
                // NOTE: contentFixture準備未完了
                'id' => '30',
                'folder_template' => 'フォルダーテンプレート3',
                'page_template' => '',
                'created' => '2016-08-10 02:17:28',
                'modified' => null
            ],
        ];
        parent::init();
    }
}
