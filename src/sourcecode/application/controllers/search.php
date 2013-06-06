<?php
class Search extends MY_Controller {
    function Search()
    {
        parent::MY_Controller();
    }

    /**
     * function view_search gets input data from search page and pass it to
     * the model Model_search
     */
    function view_search()
    {
        $this->load->view('view_head');
        $this->load->view('view_main');
        
      $search_terms = $this->input->post('q');
  
                
        if ($search_terms)
        {
            $this->load->model('model_search');
            $results = $this->model_search->search($search_terms);
        }

        $this->load->view('view_search', array(
            'search_terms' => $search_terms,
            'results' => @$results
            ));	
        $this->load->view('view_footer');
    }
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */