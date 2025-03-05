<?php
// PayDay 1.7.10 - Classic Minecraft Server (2015-2018)
// Website including forum, donation system, and player login

include 'database.php';
session_start();

$serverIP = "mc.paydayserver.com";
$serverPort = "25565";
$playersOnline = rand(1, 250); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PayDay 1.7.10 - Classic Minecraft Server (2015-2018)</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>PayDay 1.7.10 - Classic Minecraft Server (2015-2018)</h1>
            <p>Experience the authentic 2015-2018 Minecraft server era with custom economy, PvP, and survival all in one place!</p>
            <p><b>🌍 Players Online: <?php echo $playersOnline; ?></b></p>
            <a href="donate.php" class="btn btn-success btn-lg">Donate & Get Exclusive Perks</a>
        </header>
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="forum.php">Forum</a></li>
                    <li><a href="donate.php">Donate</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="content">
            <h2>Join the Adventure</h2>
            <p>PayDay 1.7.10 is a unique Minecraft server offering an exciting mix of <b>economy, PvP, and survival gameplay</b>. Build, trade, fight, and conquer in a highly competitive world.</p>
            
            <h3>Features:</h3>
            <ul>
                <li>💰 Custom <b>economy system</b> with shops, jobs, and trading.</li>
                <li>⚔️ Competitive <b>PvP arenas</b> with ranking and rewards.</li>
                <li>🏠 Land claiming & <b>anti-grief protection</b>.</li>
                <li>🚀 Frequent <b>events & giveaways</b>.</li>
                <li>🔓 Unlock <b>premium ranks & perks</b> through donations.</li>
            </ul>
            
            <h3>How to Join:</h3>
            <p>📌 Server IP: <b>mc.paydayserver.com</b></p>
            <p>🛠️ Version: <b>Minecraft 1.7.10</b></p>
        </div>
        
        <div class="donation-box text-center">
            <h3>Support the Server & Unlock Perks</h3>
            <p>Get <b>exclusive ranks, commands, kits, and more</b> by supporting the server.</p>
            <a href="donate.php" class="btn btn-primary">View Donation Packages</a>
        </div>
        
        <div class="forum-section">
            <h2>Community Forum</h2>
            <p>Discuss, share ideas, and connect with other players.</p>
            <a href="forum.php" class="btn btn-info">Visit Forum</a>
        </div>
    </div>
    
    <footer class="text-center">
        <p>&copy; 2015-2018 PayDay 1.7.10 Server | All Rights Reserved</p>
    </footer>

    <script src="public/js/main.js"></script>
</body>
</html>
