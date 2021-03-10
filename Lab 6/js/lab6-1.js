/* jQuery and JavaScript code here for lab6-1.html */
$(function () {
  // change title
  $("#pageTitle").text("Lab 6 - DOM Manipulation with jQuery");
  // change container bgcolor
  $("main").css("backgroundColor", "ivory");
  // textArea
  var msg = $("#msgArea").attr("class");
  $("#msgArea").attr("placeholder", "My class is " + msg);
  // 'view details' button
  $(".btn-primary").css("backgroundColor", "red");
  // center icons
  $(".center-icons").css("backgroundColor", "yellow");
  //add events to panel class
  $(".panel")
    .on("click", function () {
      $("#message").text("You clicked this panel!");
    })
    .on("mousemove", function (e) {
      $("#message").text("x = " + e.pageX + " y = " + e.pageY);
    })
    .on("mouseleave", function (e) {
      $("#message").text("The mouse has left!");
    });
  // create img
  var img = $("<img>", {
    src: "images/art/thumbs/13030.jpg",
  });
  $("#panel-2").append(img);
  // floating preview
  $(".img-responsive").on("mousemove", function() {
    var alt = $(this).attr("alt");
    var src = $(this).attr("src");
    var newsrc = src.replace("small", "medium");
    var preview = $('<div id="preview"></div>');
    var image = $('<img src = "' + newsrc + '">');
    var caption = $("<p>" + alt + "</p>");
    preview.css(
      "position",
      "absolute",
      "top",
      "100px",
      "left",
      "0px",
      "display",
      "none",
    );
    $("main").prepend(preview);
    $("#preview").prepend(image);
    $("#preview").append(caption);
    $("#preview").fadeIn(1000);
    $(this).css("filter", "grayscale(100%)");
  });
    $("#stories img").on("mouseleave", function () {
      $("#preview").remove();
      $(".img-responsive").css("filter", "grayscale(0%)");
    });
});

