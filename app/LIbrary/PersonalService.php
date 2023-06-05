<?php
    namespace App\Library;

    class PersonalService {
        public function get_name(){
            $d = app('personal');
            return $d->get_name();
        }
    }
?>