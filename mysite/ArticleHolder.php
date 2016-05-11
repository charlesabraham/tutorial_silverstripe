<?php

class ArticleHolder extends Page {

private static $allowed_children = array ('ArticlePage');

private static $has_many = array (
        'Categories' => 'ArticleCategory'
    );

  public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Categories', GridField::create(
            'Categories',
            'Article categories',
            $this->Categories(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }


 public function ArchiveDates() {

        $list = ArrayList::create();
        $stage = Versioned::current_stage();

        $query = new SQLQuery(array ());
        $query->selectField("DATE_FORMAT(`Date`,'%Y-%M-%m')","Date")
              ->setFrom("ArticlePage")
              ->setOrderBy("Date", "ASC")
              ->setDistinct(true);




        $result = $query->execute();

//print "<pre>";
//print_r($result);
//print "</pre>";

        if($result) {
            while($record = $result->nextRecord()) {

	if($record['Date'] != ''){

                list($year, $monthName, $monthNumber) = explode('-', $record['Date']);

                $list->push(ArrayData::create(array(
                    'Year' => $year,
                    'MonthName' => $monthName,
                    'MonthNumber' => $monthNumber,
                    'Link' => $this->Link("date/$year/$monthNumber"),
                    'ArticleCount' => ArticlePage::get()->where("
                            DATE_FORMAT(`Date`,'%Y%m') = '{$year}{$monthNumber}'
                            AND ParentID = {$this->ID}
                        ")->count()
                )));
            }

		}
        }

return $list;

}

}

class ArticleHolder_Controller extends Page_Controller {

private static $allowed_actions = array (
        'date'
    );

public function date(SS_HTTPRequest $r) {


	$properties = ArticlePage::get();

        $year = $r->param('ID');
        $month = $r->param('OtherID');

        if(!$year) return $this->httpError(404);

        $startDate = $month ? "{$year}-{$month}-01" : "{$year}-01-01";

        if(strtotime($startDate) === false) {
            return $this->httpError(404, 'Invalid date');
        }

        $adder = $month ? '+1 month' : '+1 year';
        $endDate = date('Y-m-d', strtotime(
                        $adder, 
                        strtotime($startDate)
                    ));

        $properties  = $properties->filter(array(
            'Date:GreaterThanOrEqual' => $startDate,
            'Date:LessThan' => $endDate 
        ));


        return array (
	    'AllChildren' => $properties,
            'StartDate' => DBField::create_field('SS_DateTime', $startDate),
            'EndDate' => DBField::create_field('SS_DateTime', $endDate)
        );

    }




}
