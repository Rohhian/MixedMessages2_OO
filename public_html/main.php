<!DOCTYPE html>
<html lang="en">
<head>
    <title>Really Mixed Messages...</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="header" style="background-color: coral">
    <div id="inputs">
        <span style="display: inline-block">
            <input id="adj" type="text" name="adjectives" placeholder="enter new adjective">
            <button onclick="sendNewWord(document.getElementById('adj').name, document.getElementById('adj').value)">
    Send Adj
</button>
            &nbsp&nbsp||&nbsp&nbsp
</span>
        <span style="display: inline-block">
            <input id="noun" type="text" name="nouns" placeholder="enter new noun">
            <button onclick="sendNewWord(document.getElementById('noun').name, document.getElementById('noun').value)">
    Send Noun
</button>
            &nbsp&nbsp||&nbsp&nbsp
</span>
        <span style="display: inline-block">
            <input id="verb" type="text" name="verbs" placeholder="enter new verb">
            <button onclick="sendNewWord(document.getElementById('verb').name, document.getElementById('verb').value)">
    Send Verb
</button>
        </span>
    </div>
    <div class="errorMessage">You will see really confusing messages</div>
    <div class="errorMessage"> <?php echo 'holy crap'; ?> </div>
</div>

<div id="box">
    <div id="message" class="message"></div>
</div>
<div id="box2">
    <div id="weather"></div>
    <div id="weather2"></div>
    <div id="weather3"></div>
    <div id="weather4"></div>
</div>

<script src="mixedmessages2.js"></script>

</body>
</html>