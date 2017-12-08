<?php

namespace TheWebmen\FAQ\Model;

use SilverStripe\ORM\DataObject;

class FAQQuestion extends DataObject {

    private static $singular_name = 'Question';
    private static $plural_name = 'Questions';

    private static $db = [
        'Question' => 'Varchar(255)',
        'Answer' => 'HTMLText',
        'Sort' => 'Int'
    ];

    private static $has_one = [
        'Category' => FAQCategorie::class
    ];

    private static $summary_fields = [
        'Question',
        'Created'
    ];

    private static $default_sort = 'Sort';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('Sort');
        $fields->removeByName('CategoryID');

        return $fields;
    }

    public function getTitle(){
        return $this->Question;
    }

}
