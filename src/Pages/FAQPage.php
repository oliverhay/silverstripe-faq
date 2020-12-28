<?php

namespace TheWebmen\FAQ\Pages;

use SilverStripe\Core\Config\Config;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use TheWebmen\FAQ\Model\FAQCategorie;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class FAQPage extends \Page {

    /**
     * @config
     */
    private static $itemsPerPage = 15;

    private static $table_name = 'TheWebmen_FAQPage';

    private static $has_many = [
        'Categories' => FAQCategorie::class
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $gridConfig = GridFieldConfig_RecordEditor::create(Config::inst()->get(self::class, 'itemsPerPage'));
        $gridConfig->addComponent(new GridFieldOrderableRows());
        $fields->addFieldToTab('Root.Categories', new GridField('Categories', _t(self::class . '.CATEGORIES', 'Categories'), $this->Categories(), $gridConfig));

        return $fields;
    }

}
