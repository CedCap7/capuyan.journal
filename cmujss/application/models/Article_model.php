<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {

    public function __construct(){
        $this->load->database();
        $this->load->model('Article_model');
        $this->load->model('Volume_model'); 
    }

    public function fetch_articles($query=NULL){
		if ($query !== NULL ) {
			$this->db->order_by('title', 'ASC');
			$this->db->like('title', $query);
			$this->db->or_like('keywords', $query);
			$this->db->like('abstract', $query);
		}
		$this->db->order_by('title', 'ASC');
		$query = $this->db->get('articles');
		return $query->result_array();
	}

    public function search_articles($keyword) {
        $this->db->like('title', $keyword);
        $this->db->or_like('keywords', $keyword);
        $query = $this->db->get('articles');
        return $query->result_array();
    }
    public function get_articles_public() {
        // Joining articles with authors based on the 'title' foreign key
        $this->db->select('articles.*, authors.author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.title = authors.title', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        // Add condition to check if the article is published
        $this->db->where('articles.published', 1);

        // Perform the query
        $query = $this->db->get();

        // Return the result as an array
        return $query->result_array();
    }

    public function get_articles_archive() {
        // Joining articles with authors based on the 'title' foreign key
        $this->db->select('articles.*, authors.author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.title = authors.title', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        // Add condition to check if the article is published
        $this->db->where('articles.published', 2);

        // Perform the query
        $query = $this->db->get();

        // Return the result as an array
        return $query->result_array();
    }

    public function get_articless() {
        // Joining articles with authors
        $this->db->select('articles.*, authors.author_name');
        $this->db->from('articles');
        $this->db->join('article_author', 'articles.articleid = article_author.articleid', 'left');
        $this->db->join('authors', 'article_author.auid = authors.auid', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_articles() {
        // Selecting columns from articles, authors, and volume tables
        $this->db->select('articles.*, authors.author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.title = authors.title', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        
        // Ordering volumes in descending order
        $this->db->order_by('volume.volumeid', 'DESC');
        
        // Perform the query
        $query = $this->db->get();
        
        // Return the result as an array
        return $query->result_array();
    }
    

    // public function get_article_by_id($articleid) {
    //     $query = $this->db->get_where('articles', array('articleid' => $articleid));
    //     return $query->row_array();
    // }

    // public function update_article($articleid, $data) {
    //     $this->db->where('articleid', $articleid);
    //     return $this->db->update('articles', $data);
    // }
    
    public function add_article($data) {
        // Insert the data into the 'articles' table
        $inserted = $this->db->insert('articles', $data);
        
        // Return TRUE if insertion was successful, FALSE otherwise
        return $inserted;
    }

    // public function get_article_by_id($articleid) {
    //     // Retrieve article data based on article ID
    //     return $this->db->get_where('articles', array('articleid' => $articleid))->row_array();
    // }

    // public function update_article($articleid, $data) {
    //     // Update article data in the database
    //     $this->db->where('articleid', $articleid);
    //     return $this->db->update('articles', $data);
    // }

    public function delete_article($articleid) {
        // Check if the patient exists
        $this->db->where('articleid', $articleid);
        $query = $this->db->get('articles');

        if ($query->num_rows() > 0) {
            // Patient exists, delete it
            $this->db->where('articleid', $articleid);
            $this->db->delete('articles');
            return true;
        } else {
            // Patient not found
            return false;
        }
    }
    // public function delete_article($articleid) {
    //     // Delete article from database based on the given article ID
    //     $this->db->where('articleid', $articleid);
    //     return $this->db->delete('articles');
    // }


    // new

    public function get_article_by_id($articleid) {
        $this->db->select('articles.*, authors.author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('article_author', 'articles.articleid = article_author.articleid', 'left');
        $this->db->join('authors', 'article_author.auid = authors.auid', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        $this->db->where('articles.articleid', $articleid);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_article($articleid, $articleData) {
        $this->db->where('articleid', $articleid);
        return $this->db->update('articles', $articleData);
    }

    public function get_article_forda_id($articleid) {
        $this->db->select('
            articles.articleid,
            articles.title,
            articles.keywords,
            articles.abstract,
            articles.published,
            articles.filename,
            articles.date_published,
            articles.doi,
            volume.vol_name,
            authors.author_name
        ');
        $this->db->from('articles');
        $this->db->join('article_author', 'articles.articleid = article_author.articleid');
        $this->db->join('authors', 'article_author.auid = authors.auid');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        $this->db->where('articles.articleid', $articleid);
        $query = $this->db->get();
        return $query->row_array(); // Fetch a single row as an associative array
    }
    public function get_article_id($id){
		$article = $this->db->get_where('articles', array('articleid' => $id))->row_array();
		$articleauthors = $this->volume_model->get_authors_by_article_id($article['articleid']);
			$article['authors'] = [];
			foreach ($articleauthors as &$author) {
					$article['authors'] =  $this->volume_model->get_authors_by_id($author['auid']);
			}
		return $article;
	}
    public function get_article($query=NULL){

		$this->db->select('authors.*, articles.*');
		$this->db->from('article_author');
		$this->db->join('articles', 'article_author.article_id = articles.article_id', 'inner');
		$this->db->join('authors', 'article_author.authid = authors.author_id', 'inner');
		$this->db->order_by('articles.date_published', 'DESC');
		if ($query !== NULL ) {
			$this->db->like('title', $query);
			$this->db->or_like('keywords', $query);
			$this->db->like('abstract', $query);
		}

		$query = $this->db->get();
		return $query->result_array();

	}

    public function get_articles_by_volume_id($id){
		$this->db->select('authors.*, articles.*');
		$this->db->from('article_author');
		$this->db->join('articles', 'article_author.articleid = articles.articleid', 'inner');
		$this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
		$this->db->order_by('articles.date_published', 'DESC');
		$this->db->where('articles.volumeid', $id);

		$query = $this->db->get();
		return $query->result_array();
	}

    public function update_articles_by_volume($volumeid, $data)
    {
        $this->db->where('volumeid', $volumeid);
        return $this->db->update('articles', $data); // Replace 'articles' with your actual table name if different
    }

    public function get_articles_by_volume($volumeid) {
        $this->db->where('volumeid', $volumeid);
        $this->db->where('published', 1);  // Only get articles that are published
        $query = $this->db->get('articles'); // Replace 'articles' with your actual table name if different
        return $query->result_array();
    }

    public function get_articles_grouped_by_volume() {
        $this->db->select('articles.*, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid');
        $this->db->where('articles.published', '1');
        $this->db->where('volume.status', '1');


        $query = $this->db->get();
        $result = $query->result_array();

        $grouped_articles = [];
        foreach ($result as $article) {
            $grouped_articles[$article['volumeid']]['volume_name'] = $article['vol_name'];
            $grouped_articles[$article['volumeid']]['articles'][] = $article;
        }

        return $grouped_articles;
    }

    public function get_archives_grouped_by_volume() {
        $this->db->select('articles.*, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid');
        $this->db->where('articles.published', '2');
        $this->db->where('volume.status', '2');


        $query = $this->db->get();
        $result = $query->result_array();

        $grouped_articles = [];
        foreach ($result as $article) {
            $grouped_articles[$article['volumeid']]['volume_name'] = $article['vol_name'];
            $grouped_articles[$article['volumeid']]['articles'][] = $article;
        }

        return $grouped_articles;
    }
    
}
