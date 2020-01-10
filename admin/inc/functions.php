<?php 

function redirect_to($location) {
    return header("Location: {$location}");
}