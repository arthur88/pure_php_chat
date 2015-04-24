class boot{
    private $var;
    
    function safe($var){   $filter1 = htmlspecialchars($var, ENT_QUOTES); return $filter1 = strip_tags(stripslashes($filter1)); }
    function safeDB($var){ $var = $this->safe($var); return mysql_real_escape_string($var); }
    
}
