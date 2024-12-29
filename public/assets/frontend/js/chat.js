window.twilioChat = window.twilioChat || {};

async function initClient() {

    try {
        var friendlyName=$('#booking_id').val();
        console.log(friendlyName)
        var chatId=$('#chat_uuid').val();
        var user_id=$('#user_id').val();
        var doctor_id=$('#doctor_id').val();
        const response = await axios.request({
            url: 'getConversations',
            baseURL: 'https://panel.allomed.ch/',
            //baseURL: 'https://panel.allomed.fr/',
            method: 'post',
            withCredentials: false,
            data:{
                bookingId:friendlyName,
                chat_uuid:chatId,
                doctor_id:doctor_id,
                user_id:user_id
            }
        });
        
        window.twilioChat.username = response.data.username;
        window.twilioChat.client = await Twilio.Conversations.Client.create(response.data.token);
        let conversations = await window.twilioChat.client.getSubscribedConversations();
       // console.log(conversations);
        //console.log(conversations);die;
        let conversationCont, conversationName;

        // const sideNav = document.getElementById('side-nav');
        // sideNav.removeChild(document.getElementById('loading-msg'));

        //for (let conv of conversations.items) {

            conversationCont = document.createElement('button');
            conversationCont.classList.add('conversation');
            conversationCont.id = chatId;

            conversationCont.value = chatId;
           // conversationCont.onload = async () => {
            // console.log(chatId);die;
               await setConversation(chatId, friendlyName);
           // };

            conversationName = document.createElement('h3');
            conversationName.innerHTML = `💬 ${friendlyName}`;

            conversationCont.appendChild(conversationName);
           // sideNav.appendChild(conversationCont);
       // }
    }
    catch (error){
        console.log(error);
        //location.href = '/pages/error.html';
    }
};


function sendMessage() {
    let submitBtn = document.getElementById('submitMessage');
    submitBtn.disabled = true;

    let messageForm = document.getElementById('message-input');
    let messageData = new FormData(messageForm);

    const msg = messageData.get('chat-message');
    var timestamp=(new Date()).getTime();

     var uuid=JSON.stringify(timestamp);
    if(msg.length>0){
        window.twilioChat.selectedConversation.prepareMessage()
          .setBody(msg)
          .setAttributes({uuid: uuid,
            data:"test" })
          .build()
          .send()
        .then(() => {
            document.getElementById('chat-message').value = '';
            submitBtn.disabled = false;
        })
        .catch(() => {
            showError('sending your message');
            submitBtn.disabled = false;
        });
    }else{
        document.getElementById('chat-message').value = '';
            submitBtn.disabled = false;
    }
};

async function setConversation(sid, name) {
    try {
       //console.log(sid);die;
        window.twilioChat.selectedConvSid = sid;
		console.log(window.twilioChat.selectedConvSid);
        //document.getElementById('chat-title').innerHTML = '+ ' + name;

        document.getElementById('loading-chat').style.display = 'flex';
        document.getElementById('messages').style.display = 'none';


         let submitButton = document.getElementById('submitMessage');
         submitButton.disabled = true;
        let inviteButton = document.getElementById('invite-button');
       
         inviteButton.disabled = true;

         window.twilioChat.selectedConversation = await window.twilioChat.client.getConversationBySid(window.twilioChat.selectedConvSid);

         const messages = await window.twilioChat.selectedConversation.getMessages();
          // console.log(messages);
          // console.log(JSON.stringify(messages));
         addMessagesToChatArea(messages.items, true);

         window.twilioChat.selectedConversation.on('messageAdded', msg => addMessagesToChatArea([msg], false));

         submitButton.disabled = false;
         inviteButton.disabled = false;
    } catch {
        showError('loading the conversation you selected');
    }
};

async function addMessagesToChatArea(messages, clearMessages) {
    let cont, msgCont, msgAuthor, timestamp;

    //console.log(messages);


    const chatArea = document.getElementById('messages');

    if (clearMessages) {
        document.getElementById('loading-chat').style.display = 'none';
        chatArea.style.display = 'flex';
        chatArea.replaceChildren();
    }

    for (const msg of messages) {
       // console.log(msg);
        cont = document.createElement('div');
        if (msg.state.author == window.twilioChat.username) {
            cont.classList.add('right-message');
        } else {
            cont.classList.add('left-message');
        }
        if (msg.type === 'media') {
            const media = msg.media;
            const url = await media.getContentTemporaryUrl();
            msgCont = document.createElement('img');
            msgCont.src=url;
            msgCont.classList.add('imageMessage');
            timestamp = document.createElement('p');
            timestamp.classList.add('timestamp');
            timestamp.innerHTML = msg.state.timestamp;
            msgCont.innerHTML +=  msg.state.body;
        }else{
            msgCont = document.createElement('div');
            msgCont.classList.add('message');
            timestamp = document.createElement('p');
            timestamp.classList.add('timestamp');
            timestamp.innerHTML = msg.state.timestamp;

            //msgCont.appendChild(msgAuthor);
            msgCont.innerHTML +=  msg.state.body;
        }
        cont.appendChild(msgCont);
        cont.appendChild(timestamp);

        chatArea.appendChild(cont);
    }

    chatArea.scrollTop = chatArea.scrollHeight;
}

async function inviteFriend() {
    try {
        const link = `http://localhost:3000/pages/login.html?sid=${window.twilioChat.selectedConvSid}`;

        await navigator.clipboard.writeText(link);

        alert(`The link below has been copied to your clipboard.\n\n${link}\n\nYou can invite a friend to chat by sending it to them.`);
    } catch {
        showError('preparing your chat invite');
    }
}

function logout(logoutButton) {
    logoutButton.disabled = true;
    logoutButton.style.cursor = 'wait';

    axios.request({
        url: 'createConversation',
        baseURL: 'https://panel.allomed.ch/',
        method: 'delete',
        withCredentials: false
    })
        .then(() => {
            location.href = 'http://localhost/twilio-vanilla-js-chat-app-main/pages/conversation.html';
        })
        .catch(() => {
            //location.href = '/pages/error.html';
        });
}

$('#formInputFile').change(function(event) {

    var i=window.twilioChat.client;
    var fd = new FormData();
    var filename = $('#formInputFile').val().split('\\').pop();
    var url=URL.createObjectURL(event.target.files[0]);
    sendMedia(url,filename)
     
});



async function sendMedia(url,filename){
    
    const file = await fetch(url);
    const fileBlob = await file.blob();
    let conversation = window.twilioChat.client.getSubscribedConversations();
    // // Send a media message
    const sendMediaOptions = {
     contentType: file.headers.get("Content-Type"),
     filename: filename,
     media: fileBlob
    };
    await window.twilioChat.selectedConversation.prepareMessage()
    .setBody('Hello!')
    .setAttributes({uuid: (new Date()).getTime()})
    .addMedia(sendMediaOptions)
    .build()
    .send();
}

function hideError() {
    document.getElementById('error-message').style.display = 'none';
}

function showError(msg) {
    // document.getElementById('error-message').style.display = 'flex';
    document.getElementById('error-text').innerHTML = `There was a problem ${msg ? msg : 'fulfilling your request'}.`;
}

initClient();
