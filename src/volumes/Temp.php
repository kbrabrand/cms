<?php

namespace craft\volumes;

use Craft;
use craft\helpers\UrlHelper;

/**
 * The temporary volume class. Handles the implementation of a temporary volume
 * Craft.
 *
 * @author     Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright  Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license    http://craftcms.com/license Craft License Agreement
 * @see        http://craftcms.com
 * @package    craft.app.volumes
 * @since      3.0
 */
class Temp extends Local
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('app', 'Temp Folder');
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->path !== null) {
            $this->path = rtrim($this->path, '/');
        } else {
            $this->path = Craft::$app->getPath()->getTempAssetUploadsPath();
        }

        if ($this->url === null) {
            $this->url = rtrim(UrlHelper::resourceUrl(), '/').'/tempassets/';
        }

        if ($this->name === null) {
            $this->name = Craft::t('app', 'Temporary source');
        }
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getRootUrl()
    {
        return $this->url;
    }
}
