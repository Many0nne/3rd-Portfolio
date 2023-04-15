function ab_scroll_to () {
    if(window.location.href == "http://localhost/drop-shipping/index.php") {
        const ab_scroll = document.getElementById("container")
        scrollTo({
            behavior: "smooth",
            top: Position(ab_scroll),
            left: 0
        });
        
        ab_scroll.addEventListener("click",ab_scroll_to,false)

    } else {
        window.location.href = "./index.php";
    }}

function co_scroll_to () {
    if(window.location.href == "http://localhost/drop-shipping/index.php") {
        const co_scroll = document.getElementById("container-2")
        scrollTo({
            behavior: "smooth",
            top: Position(co_scroll),
            left: 0
        });

        co_scroll.addEventListener("click",co_scroll_to,false)

    } else {
        window.location.href = "./index.php";
    }
}

function Position(obj){
    var currenttop = 0;
    if (obj.offsetParent){
        do {
        currenttop += obj.offsetTop;
    }while ((obj = obj.offsetParent));
        return [currenttop];
    }
}


function live_chat(){

    const live_chat_status = document.getElementById('live-chat');
    const live_chat_icon = document.getElementById('live-chat-icon');
    const live_chat_cross = document.getElementById('live-chat-cross');
    const live_chat_form = document.getElementById('live-chat-form');
    const live_chat_form_input = document.getElementById('live-chat-form-input');
    const display_messages = document.getElementById('display-messages');
    const form_input_message = document.getElementById('form-input-message');
    const live_chat_container = document.getElementById('live-chat-container');

    if (live_chat_status.style.width == '50px') {

        //
        live_chat_status.style.width = '300px';
        live_chat_status.style.height = '400px';
        live_chat_status.style.padding = '10px';
        //
        live_chat_icon.style.display = 'none';
        //
        live_chat_cross.style.display = 'grid';
        live_chat_cross.style.pointerEvents = 'all';
        //
        live_chat_form.style.display = 'grid';
        //
        live_chat_form_input.style.display = 'grid';
        //
        display_messages.style.display = 'grid';
        //
        form_input_message.style.display = 'grid';
        //
        live_chat_container.style.display = 'grid';

    } else {
        //
        live_chat_status.style.width = '50px';
        live_chat_status.style.height = '50px';
        live_chat_status.style.padding = '0';
        //
        live_chat_icon.style.display = 'grid';
        //
        live_chat_cross.style.display = 'none';
        //
        live_chat_form_input.style.display = 'none';
        //
        display_messages.style.display = 'none';
        //
        form_input_message.style.display = 'none';
        //
        live_chat_container.style.display = 'none';

    }
}
