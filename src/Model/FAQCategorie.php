<?php

namespace TheWebmen\FAQ\Model;

use SilverStripe\ORM\DataObject;
use TheWebmen\FAQ\Pages\FAQPage;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class FAQCategorie extends DataObject {

    private static $table_name = 'TheWebmen_FAQCategorie';

    private static $singular_name = 'Category';
    private static $plural_name = 'Categories';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Sort' => 'Int'
    ];

    private static $has_one = [
        'Page' => FAQPage::class
    ];

    private static $has_many = [
        'Questions' => FAQQuestion::class
    ];

    private static $summary_fields = [
        'Title' => 'Category',
        'Questions.Count' => 'No. Questions',
        'Created.Nice' => 'Created' 
    ];

    private static $default_sort = 'Sort';

    public function summaryFields()
    {
        $fields = parent::summaryFields();
        $fields['Questions.Count'] = _t(self::class . '.NUMBER_OF_QUESTIONS', 'Number of questions');
        return $fields;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('PageID');
        $fields->removeByName('Questions');
        $fields->removeByName('Sort');

        $gridConfig = GridFieldConfig_RecordEditor::create();
        $gridConfig->addComponent(new GridFieldOrderableRows());
        $fields->addFieldToTab('Root.Main', new GridField('Questions', _t(self::class . '.QUESTIONS', 'Questions'), $this->Questions(), $gridConfig));

        return $fields;
    }

}
