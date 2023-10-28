const chatInput= document.querySelector("#chat-input");
const sendButton= document.querySelector("#send-btn");
const chatContainer= document.querySelector(".chat-container");
const themeButton= document.querySelector("#theme-btn");
const deleteButton= document.querySelector("#delete-btn");
let userText=null;
const API_KEY="";

const initializeChat=()=>{
    try{
    const themeColor= localStorage.getItem("themeColor");
    document.body.classList.toggle("light_mode", themeColor === "light_mode");
    themeButton.innerText= document.body.classList.contains("light_mode") ? "dark_mode":"light_mode";

    const defaultText= `<div class="default-text">
    <h1>The Clean Divorce chatbot</h1>
    
</div>`
    chatContainer.innerHTML=localStorage.getItem("all-chats") || defaultText;
    chatContainer.scrollTo(0,chatContainer.scrollHeight);
    }catch(error){
        console.error("Error initializing chat", error);


    }

}

const startconverDiv=(content, className)=>{
    const chatDiv=document.createElement("div");
    chatDiv.classList.add("chat", className);
    chatDiv.innerHTML=content;
    return chatDiv;
}

const fetchConverReply = async (incomingChatDiv) => {
    const API_URL= "https://api.openai.com/v1/completions";
    const pElement= document.createElement("p");

    const requestOptions={
        method: "POST", 
        headers:{
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        }, 
        body: JSON.stringify({
            model:"text-davinci-003",
            prompt: userText, 
            max_tokens:2048, 
            temperature:0.2,
            n: 1,
            stop: null
        })
    }


    try{ 
        const response=await(await fetch (API_URL, requestOptions)).json();
        pElement.textContent= response.choices[0].text.trim();

    }catch(error){
        pElement.classList.add("error");
        pElement.textContent="Please try again";


    }

    incomingChatDiv.querySelector(".typing-animation").remove();
    incomingChatDiv.querySelector(".chat-details").appendChild(pElement);
    localStorage.setItem("all-chats", chatContainer.innerHTML);
    chatContainer.scrollTo(0,chatContainer.scrollHeight);

}

const copyConverText=(copyBtn)=>{
    try{
    const responseTextElement= copyBtn.parentElement.querySelector("p");
    navigator.clipboard.writeText(responseTextElement.textContent);
    copyBtn.textContent="done";
    setTimeout(() => copyBtn.textContent = "content_copy", 1000);
}catch (error){

    console.error("Error copying texts", error);

}
}

const displayImages=()=>{
    const html= `<div class="chat-content">
    <div class="chat-details">
        <img src="images/chatbot.jpg" alt="chatbot-img">
        <div class="typing-animation">
            <div class="typing-dot" style="--delay: 0.2s"></div>
            <div class="typing-dot" style="--delay: 0.3s"></div>
            <div class="typing-dot" style="--delay: 0.4s"></div>
        </div>
    </div>
    <span onclick="copyConverText(this)" class="material-symbols-rounded">content_copy</span>
</div>`;
    const incomingChatDiv= startconverDiv(html,"incoming");
    chatContainer.appendChild(incomingChatDiv);
    chatContainer.scrollTo(0,chatContainer.scrollHeight);
    fetchConverReply(incomingChatDiv);

}


const processConver=()=>{
    userText = chatInput.value.trim();
    if(!userText) return;

    chatInput.value="";
    chatInput.style.height= `${initialInputHeight}px`;

    const html= `<div class="chat-content">
    <div class="chat-details">
        <img src="images/user.jpg" alt="user-img">
        <p>${userText}</p>
    </div>
</div>`;
    const outgoingChatDiv=startconverDiv(html,"outgoing");
    chatContainer.querySelector(".default-text")?.remove();
    chatContainer.appendChild(outgoingChatDiv);
    chatContainer.scrollTo(0,chatContainer.scrollHeight);
    setTimeout(displayImages, 500);

}

deleteButton.addEventListener("click", () =>{
    if(confirm("Are u sure u want to delet all the chats")){
        try{
        localStorage.removeItem("all-chats");
        initializeChat();
        }catch (error){

            console.error("Error deleting chats from the local storage", error);

        }
    }
});

themeButton.addEventListener("click", ()=>{
    document.body.classList.toggle("light-mode");
    localStorage.setItem("themeColor", themeButton.innerText);
    themeButton.innerText= document.body.classList.contains("light-mode")? "dark_mode": "light_mode";

});

const initialInputHeight=  chatInput.scrollHeight;

chatInput.addEventListener("input",()=>{
    chatInput.style.height= `${initialInputHeight}px`;
    chatInput.style.height= `${chatInput.scrollHeight}px`;

});

chatInput.addEventListener("keydown", (e)=>{
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth >800){
        e.preventDefault();
        processConver();
    }

});

initializeChat();
sendButton.addEventListener("click", processConver);

