// voor de follow
function follow() {
    document.getElementById('follow').style.display = "none";
    document.getElementById('unfollow').style.display = "inline";
    // alert("YEEEAAAAH thank you very much for following me!");
}

// voor unfollow
function unfollow() {
    document.getElementById('follow').style.display = "inline";
    document.getElementById('unfollow').style.display = "none";
    // alert("would you unfollow the admin? I shouldn't do that!");
}

// hier voor de like 
function likeIt() {
    document.getElementById('thumbsDown').style.display = "inline";
    document.getElementById('thumbsUp').style.display = "none";
}

// en de hate it
function hateIt() {
    document.getElementById('thumbsDown').style.display = "none";
    document.getElementById('thumbsUp').style.display = "inline";
}

function threadsClick() {
    location.href = "threads.html";
}

// voor de topics
function verwijzing() {
    document.getElementById('topic').addEventListener("click", function () {
        location.href = "reactions.html";
    });

    document.getElementById('topic1').addEventListener("click", function () {
        // window.open('https://www.google.com', '_blank')
        location.href = "reactions.html";
    });

    document.getElementById('topic2').addEventListener("click", function () {
        location.href = "reactions.html";
    });

    document.getElementById('topic3').addEventListener("click", function () {
        location.href = "reactions.html";
    });
}

// als iets muis over is
function mouseover() {
    // this.style.textDecoration = "underline";
    document.getElementById("previous").style.textDecoration = "underline";
}

// hier als muis eruit is
function mouseout() {
    document.getElementById("previous").style.textDecoration = "none";
}

// voor nieuwe reactie
function newReaction() {
    document.getElementById('exampleModal').style.display = "inline";
}

// nieuwe topic
function newTopic() {
    document.getElementById('exampleModal').style.display = "inline";
}

//hiden deleten van topic
function deleteTopic() {
    alert('Dit kan straks in de dev alleen de admin');
    document.getElementById('deleteTopic').style.display = "none";
    document.getElementById('deleteTopic_hidden').style.display = "inline";

    var deleteTopic_classes = document.querySelectorAll('.deleteTopic');

    deleteTopic_classes.forEach((x) => {
        if (x.classList.contains === "inline") {
            x.style.display = "none";
        } else {
            x.style.display = "inline";
        }
    })
}

function deleteTopic_hidden() {
    alert('Dit kan straks in de dev alleen de admin');
    document.getElementById('deleteTopic').style.display = "inline";
    document.getElementById('deleteTopic_hidden').style.display = "none";

    var hide = document.querySelectorAll('.deleteTopic');

    hide.forEach((x) => {
        if (x.classList.contains === "none") {
            x.style.display = "inline";
        } else {
            x.style.display = "none";
        }
    })
}


// vorige pagina
function previous() {
    location.href = "threads.html";
}

// naar de topic
function previousTopic() {
    location.href = "topic.html";
}
