<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_volumes() {
        $this->db->select('*');
        $this->db->from('volume');
        // $this->db->where('status', 1); // Filter volumes with status 1
        $this->db->order_by('vol_name', 'ASC'); // Order volumes by name in ascending order

        $query = $this->db->get();
        $volumes = $query->result_array();

        // Fetch articles for each volume
        foreach ($volumes as &$volume) {
            $volume['articles'] = $this->get_articles_by_volume_id($volume['volumeid']);
        }

        return $volumes;
    }

    public function get_articles_by_volume_id($id) {
        $this->db->select('authors.*, articles.*');
        $this->db->from('article_author');
        $this->db->join('articles', 'article_author.articleid = articles.articleid', 'inner');
        $this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
        $this->db->where('articles.volumeid', $id);
        $this->db->order_by('articles.date_published', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function search_volumes($keyword) {
        $this->db->like('vol_name', $keyword);
        $this->db->or_like('description', $keyword);
        $query = $this->db->get('volumes');
        return $query->result_array();
    }

    public function fetch_volume($query = NULL) {
        if (!is_null($query)) {
                $this->db->order_by('vol_name', 'ASC');
            $this->db->like('vol_name', $query);
            $this->db->or_like('description', $query);
        }
    
            $this->db->order_by('vol_name', 'ASC');
        $query = $this->db->get('volume');
        $volumes = $query->result_array();
    
        return $volumes;
    }

    public function get_volume() {
        $this->db->order_by('vol_name', 'ASC');
        $query = $this->db->get('volume');
        $volumes = $query->result_array();


    foreach ($volumes as &$volume) {
        $volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
    }

    return $volumes;
}
    public function add_volume($data) {
        $inserted = $this->db->insert('volume', $data);
        return $inserted;
    }

    // public function get_volume_by_id($volumeid) {
    //     $this->db->where('volumeid', $volumeid);
    //     $query = $this->db->get('volume');
    //     return $query->row_array();
    // }

    public function update_volume($volumeid, $data) {
        $this->db->where('volumeid', $volumeid);
        return $this->db->update('volume', $data);
    }

    public function delete_volume($volumeid) {
        $this->db->where('volumeid', $volumeid);
        $query = $this->db->get('volume');

        if ($query->num_rows() > 0) {
            $this->db->where('volumeid', $volumeid);
            $this->db->delete('volume');
            return true;
        } else {
            return false;
        }
    }

    // new
    public function get_archived_volumes() {
		$this->db->where('archived', 1);
		$query = $this->db->get('volume');
		$volumes = $query->result_array();

		foreach ($volumes as &$volume) {
			$volume['articles'] = $this->get_articles_by_volume_id($volume['volumeid']);
		}

		return $volumes;
	}

    public function fetch_published_volume($query = NULL) {
        if (!is_null($query)) {
            $this->db->order_by('vol_name', 'ASC');
                $this->db->like('vol_name', $query);
                $this->db->or_like('description', $query);
        }
        
        $this->db->where('published', 1);
        $this->db->where('archived', 0);
        $this->db->order_by('vol_name', 'ASC');
        $query = $this->db->get('volume');
        $volumes = $query->result_array();
    
        return $volumes;
    }

	public function get_volume_id($id) {
    $volume = $this->db->get_where('volume', array('volumeid' => $id))->row_array();

    if ($volume) {
        $volume['articles'] = $this->get_articles_by_volume_id($volume['volumeid']);
    }

    return $volume;
	}

	public function get_volume_by_id_with_raw_articles($id) {
    $volume = $this->db->get_where('volume', array('volumeid' => $id))->row_array();
    if ($volume) {
        $volume['articles'] = $this->get_articles_by_volume_id($volume['volumeid']);
    }

    return $volume;
	}

	public function get_articles_by_volume($id){

	}

    public function get_all_volumes()
    {
        $this->db->where('status !=', 2);
        $this->db->order_by('volumeid', 'DESC'); // Order volumes in descending order
        $query = $this->db->get('volume'); // Ensure 'volume' matches your table name
        return $query->result_array();
    }
    


    public function get_volume_by_id($id)
    {
        $query = $this->db->get_where('volume', ['volumeid' => $id]);
        return $query->row_array();
    }
	// public function get_volume_by_id($id) {

	// 	$volumes = $this->db->get_where('volume', array('vol_id' => $id))->result_array();

	// 	foreach ($volumes as &$volume) {
	// 		$volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
	// 	}
	// 	return $volumes;
	// }



	// public function get_articles_by_volume_id($id){
	// 	// $this->db->select('authors.*, articles.*');
	// 	// $this->db->from('article_author');
	// 	// $this->db->join('articles', 'article_author.article_id = articles.article_id', 'inner');
	// 	// $this->db->join('authors', 'article_author.authid = authors.author_id', 'inner');
	// 	// $this->db->order_by('articles.date_published', 'DESC');
	// 	// $this->db->where('articles.volumeid', $id);

	// 	$query = $this->db->get_where('articles', array('volumeid'=> $id));
	// 	$articles = $query->result_array();
	// 	foreach ($articles as &$article) {
	// 		$articleauthors = $this->get_authors_by_article_id($article['articleid']);
	// 		$article['authors'] = [];
	// 		foreach ($articleauthors as &$author) {
	// 				$article['authors'][] =  $this->get_authors_by_id($author['auid']);
	// 		}
	// 	}
	
	// 	return $articles;
	// }

	public function get_raw_articles_by_volume_id($id){
		$query = $this->db->get('articles');
		return $query->result_array();
	}

	public function get_authors_by_article_id($id){
		$query = $this->db->get_where('article_author', array('articleid' => $id));
		return $query->result_array();
	}

	public function get_authors_by_id($id){
		$query = $this->db->get_where('authors', array('auid'=> $id));
		return $query->row_array();
	}

    public function get_archived_volumes_with_articles()
    {
        $this->db->where('status', 2); // Only get volumes with published = 2
        $volumes_query = $this->db->get('volume'); // Ensure 'volume' matches your table name
        $volumes = $volumes_query->result_array();

        foreach ($volumes as &$volume) {
            $this->db->where('volumeid', $volume['volumeid']);
            $this->db->where('published', 2); // Only get articles with published = 2
            $articles_query = $this->db->get('articles'); // Ensure 'articles' matches your table name
            $volume['articles'] = $articles_query->result_array();
        }

        return $volumes;
    }
    
}