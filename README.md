# portfolio
portfolio with register/connexion system and a private messaging system.

(the messaging system do not use jquery so, you will have to reload to see the messages)

everything work fine.

BUT, you the project is put on a web server instead of a localhost, there is some problem.

First, the redirection system on the index page does not seem to work, i don't know why, i tried a lot of different conditions but
it never work. The variable ($_SESSION), is indeed null when you did not log-in or that you choosed to log-out.
There condition seem to work with the list of people you can message and the private_message page but not index.

Secondly, The private messaging system have a little problem that is similar to the first one. When you type a message and send it,
normaly, it should send it and redirect you.The problem is that, you are redirected to the same page but why only the header, you can come back with either
using the back_arrow or executing the url by pressing enter.
If you where to reload the page before doing any of those two thing, the previous request will execute again, meaning that you will send the message again.
It's like using a while for sending one message.

I don't know what i could do to repair this so if you know, GG.
