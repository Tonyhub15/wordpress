var j = jQuery.noConflict();

j(document).ready(function(){

  j(".walkbtn").click(function(){
    j(".walkthrough").slideToggle("slow");
    j(this).toggleClass("active"); return false;
  });
  
   
});