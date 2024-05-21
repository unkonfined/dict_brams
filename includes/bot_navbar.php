<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>

.btn-group-nav {
    
}
.btn-group-nav button { /* Green background */
    align-items: center;
    border: 1px ; /* Green border */
    color: black; /* White text */
    padding: 10px 24px; /* Some padding */
    cursor: pointer; /* Pointer/hand icon */
    float: left; /* Float the buttons side by side */
    font-family: Arial, Helvetica, sans-serif;
    height: 65px;
    font-size: 15px;
    font-weight: bold;
}

/* Clear floats (clearfix hack) */
.btn-group-nav:after {
    content: "";
    clear: both;
    display: table;
}

.btn-group-nav button:not(:last-child) {
    border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group-nav button:hover {
    background-color: #D8F1B9;
}
</style>
<body>
<div class="btn-group-nav" style="width:100%">
    <button style="width:15%"></button>
    <button style="width:10%">HOME</button>
    <button style="width:10%">REGISTRATION FORM</button>
    <button style="width:10%">HOUSEHOLD FORM</button>
    <button style="width:10%">LIST OF RESIDENTS</button>
    <button style="width:10%">MENU OF DOCUMENTS</button>
    <button style="width:10%">LOG IN</button>
    <button style="width:10%">ABOUT</button>
    <button style="width:15%"></button>
</div>

</body>
</html>
