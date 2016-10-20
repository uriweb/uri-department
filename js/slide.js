jQuery(document).ready(function($) {
  
  // Expand Panel
  $(".open").click(function(){
    $("div#panel").slideDown("90", "easeInSine");
  
  });  
  
  // Collapse Panel
  $(".close").click(function(){
    $("div#panel").slideUp("800", "easeInOutCirc");  
  });    
  
  // Expand sidebar nav
  $(".opensb").click(function(){
    $("div#sbnav").slideDown("90", "easeInSine");
  
  });  
  
  // Collapse sidebar nav
  $(".closesb").click(function(){
    $("div#sbnav").slideUp("800", "easeInOutCirc");  
  });    
  
    // Switch buttons from "Log In | Register" to "Close Panel" on click
  $("a.toggleclosemobile").click(function () {
    $("a.toggleclosemobile").toggle();
  });    
  
  // Show the drawer closer only without toggles
  $("a.toggle").click(function () {
    $("a.toggleclose").show();
  });
  
    // Switch buttons from "Log In | Register" to "Close Panel" on click
  $(".toggleall a").click(function () {
    $(".toggleall a").toggle();
  }); 
  
   // Force the drawer closers to close itself
  $("a.toggleclose").click(function () {
    $("a.toggleclose").toggle();
  });
    
});