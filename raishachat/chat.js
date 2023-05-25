const messageInput = document.getElementById("message-input");
const sendButton = document.getElementById("send-button");
const chatMessages = document.querySelector(".chat-messages");

sendButton.addEventListener("click", sendMessage);
messageInput.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    sendMessage();
  }
});

function sendMessage() {
  const message = messageInput.value;
  if (message.trim() !== "") {
    const messageElement = document.createElement("div");
    messageElement.classList.add("message", "sent");
    messageElement.innerText = message;
    chatMessages.appendChild(messageElement);
    messageInput.value = "";
    chatMessages.scrollTop = chatMessages.scrollHeight;
    simulateReply(); // Simulate receiving a reply
  }
}

function simulateReply() {
  setTimeout(function () {
    // const reply = "This is a reply.";
    const replyElement = document.createElement("div");
    replyElement.classList.add("message", "received");
    replyElement.innerText = reply;
    chatMessages.appendChild(replyElement);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }, 1000); // Simulate a delayed reply
}
