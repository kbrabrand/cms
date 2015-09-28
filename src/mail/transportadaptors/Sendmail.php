<?php
/**
 * @link      http://buildwithcraft.com/
 * @copyright Copyright (c) 2015 Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license
 */
namespace craft\app\mail\transportadaptors;

use Craft;

/**
 * Sendmail implements a Sendmail transport adapter into Craft’s mailer.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class Sendmail extends BaseTransportAdaptor
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName()
    {
        return 'Sendmail';
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getTransportConfig()
    {
        return [
            'class' => 'Swift_SendmailTransport',
        ];
    }
}