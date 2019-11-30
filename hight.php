<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Highlight, capture, and designate keeywords</title>
<style type="text/css">
.selectedText{
background-color:#000;
color:#fff    
}

.badText, #badText li{
color:#F00 !important    
}

.goodText, #goodText li{
color:#0C0 !important    
}
</style>
 
</head>

<body>
<h1>Highlight and capture content</h1>
<p>By Michael P. Stone - <a href="http://www.michaelpstone.net">www.michaelpstone.net</a></p>
    <p>In this demo, you're going to be able to highlight a piece of text and click it to decide whether it's a good piece of text or a bad piece of text</p>
    <p><strong>Instructions:</strong> Highlight a piece of text within the bordered container, click off of it, then you can click on that selection to either define as good or bad. You can continue to click that piece as it will just go back between good and bad. After you've selected all of the text you want, you can press the button that says <strong>"Extract Highlighted Text"</strong>.
<div id="highlightContainer">
    <p id="textWithinHighlightContainer" style="line-height:1.9em; font-size:16px; margin:10px; border:1px #333 solid; padding:5px; width: 450px">
Jowl pig chuck pork, tri-tip salami jerky andouille ham ground round rump beef ribs filet mignon hamburger. Brisket filet mignon pork belly fatback. Ham ball tip prosciutto tail. Sausage fatback filet mignon kielbasa andouille beef pancetta cow, sirloin ham hock bresaola pork loin shoulder strip steak boudin. Turducken capicola cow short loin venison ball tip. Flank pork loin boudin, short loin salami ribeye beef bacon ham hock ball tip rump pork belly. Beef ribs bresaola pork ground round hamburger pancetta short ribs, t-bone shank capicola ham sausage.
<br />
Strip steak biltong ham hock, ham pig salami andouille prosciutto filet mignon cow. Chuck turkey jerky boudin, jowl cow drumstick ball tip short loin ham hock shankle venison sirloin tail t-bone. Spare ribs bacon venison, ribeye ham hock pork tail beef ribs capicola bresaola. Beef frankfurter salami, ham hock t-bone ball tip ground round shoulder short loin meatball filet mignon brisket chuck pastrami. Kielbasa filet mignon drumstick, ham ribeye chuck jerky beef ribs pork belly ball tip bresaola biltong.
    </p>
</div>    
<br />
<input type="button" id="extractText" value="Extract Highlighted Text" style="margin-left:10px" /> <input type="button" id="clearHighlights" value="Clear Highlights" style="margin-left:10px" />
<br />
<br />
<div style="margin:10px; display:none" id="resultsCont">
    <div style="float:left; width:300px">
        <h3>Bad Text Results</h3>
        <ul id="badText">
       
        </ul>
    </div>
    <div style="float:left; width:300px">
        <h3>Good Text Results</h3>
        <ul id="goodText">
       
        </ul>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">  
//define the parent container so we retrict where we're able to highlight
var parentContainerId = "textWithinHighlightContainer"

// Make sure the object is created if it's already not
if(!window.CurrentSelection){
CurrentSelection = {}
}
//define the selector object
CurrentSelection.Selector = {}

//get the current selection
CurrentSelection.Selector.getSelected = function(){
var sel = '';
if(window.getSelection){
sel = window.getSelection()
}
else if(document.getSelection){
sel = document.getSelection()
}
else if(document.selection){
sel = document.selection.createRange()
}
return sel
}
//function to be called on mouseup
CurrentSelection.Selector.mouseup = function(){ alert();
var st = CurrentSelection.Selector.getSelected()
if(document.selection && !window.getSelection){
var range = st
range.pasteHTML("<span class='selectedText'>" + range.htmlText + "</span>");
}
else{
var range = st.getRangeAt(0)    
var newNode = document.createElement("span");
newNode.setAttribute("class", "selectedText");
range.surroundContents(newNode)                
}
}
       
$(function(){
$("#"+parentContainerId).bind("mouseup",CurrentSelection.Selector.mouseup)


//event handler for clicking the selected highlighted text
$("span.selectedText").live("click",function(){
if($(this).hasClass("goodText")){
$(this).addClass("badText").removeClass("goodText")    
}
else if($(this).hasClass("badText")){
$(this).addClass("goodText").removeClass("badText")    
}
if(!$(this).hasClass("badText") && !$(this).hasClass("goodText")){
$(this).addClass("goodText")
}
})
//extracting all of the selected highlighted text
$("#extractText").live("click",function(){
var badTextHtml = '',
goodTextHtml = ''
$.each($(".selectedText"),function(i,currItem){
if($(currItem).text() != ''){
if($(currItem).hasClass("goodText")){
goodTextHtml += "<li>"+$(currItem).text()+"</li>"    
}
if($(currItem).hasClass("badText")){
badTextHtml += "<li>"+$(currItem).text()+"</li>"    
}                        
}
})

$("#badText").html(badTextHtml)
$("#goodText").html(goodTextHtml)
$("#resultsCont").fadeIn()
})
//clear the results and set the content back to text and not html
$("#clearHighlights").live("click",function(){
var hLCont = $("#highlightContainer p")
hLCont.text(hLCont.text())
$("#resultsCont").hide()
})
})        
</script>  
</body>
</html>

