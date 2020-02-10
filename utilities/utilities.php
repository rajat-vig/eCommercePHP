<?php
class Utility {
    function sendResponse($responseObj) {
        print_r(json_encode($responseObj));
    }
}
?>