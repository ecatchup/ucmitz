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

namespace BaserCore\Mailer;

use BaserCore\Model\Entity\PasswordRequest;
use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Routing\Router;

/**
 * Class PasswordRequestMailer
 * @package BaserCore\Mailer
 */
class PasswordRequestMailer
{
    /**
     * Mailer Config
     *
     * @var string
     */
    private $mailerConfig = 'default';

    /**
     * Theme
     *
     * @var string
     */
    private $theme = 'BcAdminThird';

    /**
     * PasswordRequestMailer constructor.
     */
    public function __construct()
    {

    }

    /**
     * パスワード再発行URLメール送信
     */
    public function deliver(Entity $user, PasswordRequest $passwordRequest): array
    {
        $subject = __d('baser', 'パスワード再発行');
        $passwordRequestData = $passwordRequest->toArray();
        $createtime = $passwordRequestData['created']->timestamp;
        $agoInStr = '+' . Configure::read('BcApp.passwordRequestAllowTime') . ' min';
        $timelimit = date('Y/m/d H:i', strtotime($agoInStr, $createtime));
        $url = Router::url([
            'plugin' => 'BaserCore',
            'prefix' => 'Admin',
            'controller' => 'password_requests',
            'action' => 'apply',
            $passwordRequestData['request_key'],
        ],
            true
        );

        $mailer = new BcMailer($this->mailerConfig);
        // TODO from情報の設定
        $mailer->setFrom(['basercms@example.com' => 'basercms'])
            ->setTo($user->email)
            ->setSubject($subject)
            ->viewBuilder()
            ->setTheme($this->theme)
            ->setTemplate('password_request')
            ->setVars([
                    'limit' => $timelimit,
                    'url' => $url,
                ]
            );
        return $mailer->deliver();
    }
}
