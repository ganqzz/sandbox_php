<?php
function escape($string) {
    return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
}
