<?php
/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) NPO baser foundation <https://baserfoundation.org/>
 *
 * @copyright     Copyright (c) NPO baser foundation
 * @link          https://basercms.net baserCMS Project
 * @since         5.0.0
 * @license       https://basercms.net/license/index.html MIT License
 */

namespace BaserCore\Service;

use Cake\Datasource\EntityInterface;

/**
 * PluginsAdminService
 */
class PluginsAdminService extends PluginsService implements PluginsAdminServiceInterface
{

    /**
     * インストール画面用のデータを取得
     * @param EntityInterface $plugin
     * @return array
     */
    public function getViewVarsForInstall(EntityInterface $plugin): array
    {
        return [
            'plugin' => $plugin,
            'installStatusMessage' => $this->getInstallStatusMessage($plugin->name)
        ];
    }
}
