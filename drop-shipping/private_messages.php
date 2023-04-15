<?php 
session_start();

include "config.php";
include "header.php";


$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD, config::UTILISATEUR,config::MOTDEPASSE);



if ($_SESSION['user']['id'] == null) {
    header('location: user-login.php');
} else {
    if(isset($_GET['id']) and !empty($_GET['id'])){
        $getid = $_GET['id'];
        $recupUser = $pdo->prepare('SELECT * FROM clients where id = ?');
        $recupUser->execute(array($getid));
        if ($recupUser->rowCount() > 0){
            if (isset($_POST['send_message'])) {
                $message = htmlspecialchars($_POST['message']);
                $date = date("Y/m/d");
                $insertMessage = $pdo->prepare('INSERT INTO messages(messages, id_destinataire, id_auteur, date_publication) values (?, ?, ?, ?)');
                $insertMessage->execute(array($message, $getid, $_SESSION['user']['id'], $date));

                header('Location: ' . $_SERVER['REQUEST_URI'], true, 303);
                exit();
            }
        } else {
            echo "aucun utilisateur ne possède cet identifiant";
        }
    
    } else {
        echo "aucun identifiant trouver";
    }
}
?>

<script link="java.js" ></script>

    <div class="private-messages">
        <div class="user-selection">
            <h2>Private Messages</h2>
            <?php
                $recupuser = $pdo->query("SELECT * from clients WHERE id != {$_SESSION['user']['id']} AND id != {$getid}");
                $recupUserYouTalkTo = $pdo->query("SELECT * from clients WHERE id = {$getid}");
                $userYouTalkTo = $recupUserYouTalkTo->fetch();
                ?>
                <div class="user-you-talk-to">
                    <a><?php echo "Your are talking to : "?><br><br><?php echo $userYouTalkTo['username'] ?></a>
                </div>
                <p>People you can contact</p>
                <?php
                while($user = $recupuser->fetch()){
                    ?>
                    <div>
                        <a href="private_messages.php?id=<?php echo $user['id'] ?>"><?php echo $user['username'] ?></a>
                    </div>
                    <br>
                    <?php
                }
            ?>
        </div>
        <div class="user-private-messages">
            <div id="messages">
                <?php 
                    $recupMessages = $pdo->prepare('SELECT * FROM messages WHERE id_auteur = ? and id_destinataire = ? or id_auteur = ? and id_destinataire = ?');
                    $recupMessages->execute(array($_SESSION['user']['id'], $getid, $getid, $_SESSION['user']['id']));
                    while($messages = $recupMessages->fetch()){
                    if ($messages['id_destinataire'] == $_SESSION['user']['id']){
                        ?>
                        <p><span><?php echo $userYouTalkTo['username'], " : "?></span><?php echo $messages['messages'] ?></p>
                        <?php
                    } elseif ($messages['id_destinataire'] == $getid) {
                        ?>
                        <p><span>You : </span><?php echo $messages['messages'] ?></p>
                    <?php
                    } 
                    }
                ?>
            </div>
            <form action="" method="post">
                <textarea placeholder="Type a message here" name="message"></textarea>
                <button type="submit" name="send_message"><ion-icon name="arrow-redo-outline"></ion-icon></button>
            </form>
        </div>
    </div>


