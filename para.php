<html>
<style>
.number {
    position: absolute;
    display: inline;
    left: 0;
    font-size: smaller;
    color: blue;
}

</style>

<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sagittis orci at erat auctor porta. Nullam tincidunt purus id magna dictum, at viverra augue faucibus. Sed semper aliquam nulla nec imperdiet. Praesent quis sem diam. Nunc non gravida risus. Maecenas non rhoncus odio, eget pharetra dolor. Donec ante nisl, porttitor sed augue vel, hendrerit interdum magna. Etiam posuere suscipit lectus non condimentum. Suspendisse at eros nisl. Vivamus rutrum elementum purus, vel euismod dui mattis in. Vestibulum egestas, lectus in accumsan volutpat, turpis ipsum placerat augue, quis accumsan odio sapien sit amet odio. Pellentesque eu mauris et quam bibendum luctus ac sit amet tellus.


    Nullam risus elit, feugiat eu ultricies at, auctor in tellus. Cras sollicitudin ornare justo nec gravida. Donec consequat condimentum odio, sed laoreet odio facilisis vel. Praesent dapibus laoreet eros, nec vehicula erat consequat vel. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed vitae varius mi. Integer vel enim leo.
Vestibulum non sapien sapien. Proin et risus tempor, placerat enim non, sollicitudin nisi. Cras egestas volutpat enim, nec sagittis nisl luctus vel. Donec nisi leo, suscipit at mauris ornare, eleifend pharetra massa. Vestibulum eget euismod risus, ut molestie nisi. Suspendisse viverra, sapien a venenatis laoreet, eros neque interdum metus, nec rutrum ante eros id nibh. Suspendisse potenti. Suspendisse vulputate diam sit amet porta interdum. Integer nec semper sapien. Nam volutpat enim hendrerit eros sollicitudin, et feugiat ante facilisis. Duis gravida pretium nisl ac convallis. Nam sit amet posuere magna. Nam sed enim mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin fringilla, mi gravida convallis tincidunt, sem velit tincidunt sem, eu bibendum odio felis eu massa.
    Suspendisse quis ornare odio. Donec tincidunt dolor in elit fringilla, gravida eleifend arcu accumsan. Etiam convallis varius diam. Curabitur at orci pharetra, gravida ante eget, venenatis neque. Vivamus fermentum enim sagittis sodales molestie. Donec vel felis tincidunt, rhoncus nisi eget, aliquam libero. Nullam molestie fringilla fermentum. Suspendisse bibendum augue magna, et dictum orci ornare sit amet. Aenean in placerat magna.
</p>
<?php include_once("footer.php"); ?>
<script>

// compute a reference height
var test = $("<p>dummy</p>");
$("p").eq(0).before(test);
var refHeight = test.height();
test.remove();

var computeLines = function() {
    // remove any previous numbering
    $(".number").remove();
    var cnt = 1;
    
    // loop through paragraphs
    $("p").each(function(index) {   
        
        // get the number of lines in the paragraph
        var pos = $(this).position();
        var paragraphHeight = $(this).height();
        var lines = paragraphHeight / refHeight;
        var lineHeight = paragraphHeight / lines;
        
        // loop through lines
        for (var i=pos.top ; i<pos.top+paragraphHeight ; i += lineHeight) {
            // add the numbering paragraph at absolute position
            $("<p>", { class: "number" }).text(cnt++).css("top", i+5).insertBefore($(this));;
            console.log(i);
        }
        // add margin to allow space for numbering
        $(this).css("margin-left", "10px");
    });
};

$(window).resize(computeLines);
computeLines();

</script>