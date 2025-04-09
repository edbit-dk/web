// JavaScript Document
$(document).ready(function(){

    // Polyfill all unsupported features
    $.webshims.polyfill();	

    
//-----------js for flexslider-----------//
////-----------(Check flexSlider properties for other features)-----------//

$('.flexslider').flexslider({
    animation: "slide",
    slideshowSpeed: 2000
  });


//----------------tinynav---------------//
$("#nav").tinyNav({
  active: 'selected', // String: Set the "active" class
  header: 'Navigation', // String: Specify text for "header" and show header instead of the active item
  indent: '- ', // String: Specify text for indenting sub-items
  label: '' // String: Sets the <label> text for the <select> (if not set, no label will be added)
});












});