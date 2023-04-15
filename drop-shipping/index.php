<?php
session_start();

include "header.php";
include "config.php";

$pdo = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BDD, config::UTILISATEUR,config::MOTDEPASSE);

// Get user from session or query string

if ($_SESSION['user']['id'] == null) {
    header('location: user-login.php');
}

?>
<div class="body-container">
    <div class="container-1">
        <div class="body-container-img">
        <img id="japanese-tree" src="./images/arbre-japonais/14675-NPZDCG.png" alt="japanese tree">
        </div>
        <div class="body-container-text">
            <h1>Hello !</h1>
            <h1>My name is <span>Terry Barillon</span></h1>
            <h1>And i am a first grade <span>Fullstack developper</span></h1>
        </div>
    </div>
    <div id="container" class="container">
        <div class="container-information">
            <p>
                <span>First Name : </span> <br>
                Terry <br> <br>
                <span>Last Name : </span> <br>
                Barillon <br> <br>
                <span>Birthday : </span> <br>
                17 December 2004 <br> <br>
                <span>Phone Number : </span> <br>
                06 84 57 07 61 <br> <br>
                <span>Email : </span> <br>
                barillon.terry.85@gmail.com <br> <br>
                <span>Web Site : </span> <br>
                terry-barillon.fr <br><br>
                <span>Years of experience: </span> <br>
                - 3 Years for Python<br>
                - 1 Year for : PHP, HTML, CSS, JavaScript, C++, C#, MySql
            </p>
        </div>
        <div class="container-information-2">
            <h1>About Me</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, eius? Temporibus accusantium voluptates sapiente quidem nemo inventore laboriosam nihil. Voluptatem illo quasi corporis deleniti omnis! Officia ipsum voluptatibus vitae hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatem inventore tempore quae quis ullam provident dolore sunt, accusamus illum tempora alias esse possimus, id laborum magni aperiam! Asperiores, maiores. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius, nostrum vero. Est, odit. Nihil, earum libero unde animi rem iusto quis cupiditate porro maxime quibusdam omnis fugiat voluptatibus non perspiciatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, dolor et fuga illo cum corporis eligendi labore veniam numquam quo incidunt, accusamus expedita. Ratione ipsam qui aspernatur commodi necessitatibus recusandae.</p>
            <button>don't know</button>
        </div>
    </div>
    <div id="container-2" class="container-2">
        <div class="contact-form">
            <form id="email-sending-form" method="POST" action="./actions/send-email.php">
                <h1>Contact me</h1>
                <div class="contact-form-name">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name"/>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name"/>
                </div>
                <input type="email" name="email" id="email" placeholder="Email"/>
                <input type="text" name="phone" id="phone" placeholder="Phone Number"/>
                <textarea name="message" id="message" placeholder="Message"></textarea>
                <button type="submit" >Submit</button>
            </form>
        </div>
        <div class="contact-informations">
            <div class="contact-information-info">
                
            </div>
            <div class="social-media">
                <h2>Informations</h2>
                <p>Email : barillon.terry.85@gmail.com</p>
                <p>Location : 16 Bd Général de Gaulle, 44200 Nantes</p>
                <h2>Social Medias</h2>
                <ion-icon name="logo-github"></ion-icon>
                <ion-icon name="logo-discord"></ion-icon>
                <ion-icon name="logo-linkedin"></ion-icon>
            </div>
        </div>
    </div>
    <div id="live-chat" class="live-chat">
        <span id="live-chat-cross" onclick="live_chat()" >&times;</span>
        <ion-icon onclick="live_chat()" id="live-chat-icon" name="chatbubbles-outline"></ion-icon>
        <div id="live-chat-container" class="live-chat-container">
            <div id="display-messages" class="display-messages">
                <h5>Qui souhaitez-vous contacter ?</h5>
                <?php 
                    $recupuser = $pdo->query("SELECT * from clients WHERE id != {$_SESSION['user']['id']}");
                    while($user = $recupuser->fetch()){
                        ?>
                        <a href="private_messages.php?id=<?php echo $user['id'] ?>"><?php echo $user['username'] ?></a>
                        <?php
                    }
                ?>
            </div>
            <div id="form-input-message" class="form-input-message">
                <form id="live-chat-form" action="">
                    <input id="live-chat-form-input" type="text" name="message" id="message" placeholder="Message"/>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php"
?>
