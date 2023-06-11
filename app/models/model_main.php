<?php

class Model_main extends Model
{
    public function get_posts(){
        $q = "SELECT * FROM `posts` ORDER BY `updated_at` DESC";
        return $this->db->query($q);
    }

    public function get_post($id){
        $q = "SELECT * FROM `posts` WHERE `id` = " . $this->db->escape($id);
        $ret = $this->db->query($q);
        if(!empty($ret[0])) return $ret[0];
        return false;
    }

    public function create_post($caption, $post){
        $q = "INSERT INTO `posts` SET `caption` = " . $this->db->escape($caption) .
            ", `post` = " . $this->db->escape($post) .
            ", `user_id` = " . $this->db->escape($_SESSION['user']['id']);
        $this->db->query($q);
    }

    public function get_comments($post_id){
        $q = "SELECT * FROM `comments` WHERE `post_id` = " . $this->db->escape($post_id) . " ORDER BY `created_at` DESC";
        return $this->db->query($q);
    }

    public function add_comment($post_id, $user_id, $comment){
        $q = "INSERT INTO `comments` SET ".
            " `post_id` = " . $this->db->escape($post_id) .
            ", `user_id` = " . $this->db->escape($user_id) .
            ", `comment` = " . $this->db->escape($comment);
        $this->db->query($q);
    }

}