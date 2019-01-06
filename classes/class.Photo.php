<?php

    class Photo {
        private $photoURL = "";
        private $user;
        private $photo;

        function __construct($data) {
            $this->photo = $data;
        }

        function getText() {
            $this->photo->caption;
        }

        function getURL() {
            return $this->photo->thumbnail_resources[4]->src;
        }

        function getPhotographer() {
            return $this->photo->username;
        }


        function getCaption($user) {
            $photo = $this->photo;

            return '<p>' . $photo->caption . '</p><p>via <a href="http://instagram.com/'. $user .'">'. $user .'</a></p>';
        }
    }
?>
