<?php

namespace TheWebmen\FAQ\Pages;

use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use TheWebmen\FAQ\Model\FAQCategorie;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class FAQPage extends \Page {

    private static $table_name = 'TheWebmen_FAQPage';

    private static $has_many = [
        'Categories' => FAQCategorie::class
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $gridConfig = GridFieldConfig_RecordEditor::create();
        $gridConfig->addComponent(new GridFieldOrderableRows());
        $fields->addFieldToTab('Root.Categories', new GridField('Categories', _t(self::class . '.CATEGORIES', 'Categories'), $this->Categories(), $gridConfig));

        return $fields;
    }

}
