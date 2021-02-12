<?php

/**
 * Paginator Class
 */
class Paginator {

    /**
     * Number of rcords per page
     * @var int
     */
    public $limit;

    /** 
     * Number of records to skip 
     * @var int
     */
    public $offset;

    /**
     * Previous Page number
     * @var int
     */
    public $previous;

    /**
     * Next Page Number
     * @var int
     */
    public $next;
 
    /**
     * Constructor
     * 
     * @param int $page Page number
     * @param int $records_per_page Number of records per page
     */
    public function __construct($page, $records_per_page, $total_records) {
        
        $this->limit= $records_per_page;

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' => [
                'default' => 1,
                'min_range' => 1
            ]
        ]);
        if ($page > 1) {
            $this->previous = $page - 1;
        }

        $total_pages = ceil($total_records / $records_per_page);
        
        if ($page < $total_pages) {
            $this->next = $page + 1;
        }



        $this->offset = $records_per_page * ($page - 1);
    }

}