<?php
class Posts {

    public function getPosts() {
        global $db;
        global $user;

        $entries_db = $db->query("SELECT * FROM `klapouchy` WHERE `user_id` = '".$user->getId()."' ORDER BY `date` DESC");
        $entries = $entries_db->fetch_all(MYSQLI_ASSOC);

        foreach ($entries as $k=>$v) {
            $entries[$k]['edit_link'] = Router::link('my_content.php','action=edit&id='.$v['id']);
            $entries[$k]['remove_link'] = Router::link('my_content.php','action=delete&id='.$v['id'].'&csrf='.$user->getCsrfToken());
        }

        return $entries;
    }
}