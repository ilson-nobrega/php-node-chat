<?php
    include_once('lib/bd.php');
    $pdo = Database::getInstance()->getPdoObject();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Node + PHP + Socket.io Webchat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <style type="text/css">body { padding-top: 60px; }</style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="index.php">NodeJS_PHP</a>

        </div>
    </div>
</div>

<div div class="container">
    <form class="form-inline" id="messageForm">
        <input id="nomeInput" type="text" class="input-medium" placeholder="Name" />
        <input id="mensagemInput" type="text" class="input-xxlarge" placeHolder="Message" />

        <input type="submit" value="Send" />
    </form>

    <div>
        <ul id="messages">
            <?php
            $query = $pdo->prepare( 'SELECT * FROM mensagem ORDER BY id DESC' );
            $query->execute();

            $mensagens = $query->fetchAll( PDO::FETCH_OBJ );
            foreach( $mensagens as $mensagem ):
                ?>
                <li> <strong><?php echo $mensagem->nome; ?></strong> : <?php echo $mensagem->mensagem; ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- End #messages -->
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>
<script src="js/nodeClient.js"></script>
</body>
</html>