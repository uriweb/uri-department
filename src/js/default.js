// Get all class and id names from page and display them in the console.
// Helpful for CSS cleaning.

jQuery(function($){
    var classnames = [];
    var idnames = [];
    $('[class]').each(function(){
        classnames.append($(this).attr('class'));
    });
    $('[id]').each(function(){
        idnames.append($(this).attr('id'));
    });
    console.log("Classes: " + classnames);
    console.log("IDs: " + idnames);
});