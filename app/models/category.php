<?php

namespace app\models;

use \sys\core\Model as Model;

class Category extends Model {
    //
    public function get_category($categoryId) {
        $sql = 'select * from categories where id=?';
        $params = [$categoryId];
        $this->execute_select_query($sql, $params);
    }

    public function add_category($categoryName) {
        $sql = "insert into categories (name) values (?)";
        $params = [$categoryName];
        $this->execute_dml_query($sql, $params);
    }

    public function del_category($categoryId) {
        $sql = "delete from categories where id=?";
        $params = [$categoryId];
        $this->execute_dml_query($sql, $params);
    }

    public function edit_category($categoryName, $categoryId) {
        $sql = "update categories set=? where id=?";
        $params = [$categoryName, $categoryId];
        $this->execute_dml_query($sql, $params);
    }

    public function get_all_categories() {
        $sql = 'select * from categories';
        $result = $this->execute_select_query($sql);
        return $result;
    }
}