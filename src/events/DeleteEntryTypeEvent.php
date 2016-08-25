<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\app\events;

/**
 * Delete entry type event class.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class DeleteEntryTypeEvent extends Event
{
    // Properties
    // =========================================================================

    /**
     * @var \craft\app\models\EntryType The entry type model associated with the event.
     */
    public $entryType;
}