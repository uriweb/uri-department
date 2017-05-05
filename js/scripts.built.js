// Gulp compiles scripts and puts them here.
// Get all class and id names from page and display them at the bottom of the page.
// Helpful for CSS cleaning.

// Run this?
var List_CSS_Selectors = true;

//===========================//

if (List_CSS_Selectors) {
    jQuery(function($){

        var classes = [],
            ids = [],
            x;

        // Function to remove duplicates
        function dups(list) {
            var r = [];
            $.each(list, function(i, e) {
                if ($.inArray(e, r) == -1) r.push(e);
            });
            return r.sort();
        }

        // Get unique class names
        $('[class]').each(function(){
            classes = classes.concat($(this).attr('class').split(' '));
        });
        classes = dups(classes);

        // Get id names
        $('[id]').each(function(){
            ids.push($(this).attr('id'));
        });
        ids = dups(ids);

        // Built output and display
        var html = '<!-- DISPLAY CLASSES AND IDs FOR CSS CLEANING --><div style="width: 1000px; margin: 0 auto"><b>Unique Class Names:</b><br /><ul>';
        for (x in classes) {
            html += '<li>' + classes[x] + '</li>';
        }
        html += '</ul><br /><b>Unique ID Names:</b><br /><ul>';
        for (x in ids) {
            html += '<li>' + ids[x] + '</li>';
        }
        html += '</ul></div>';
        $('#footer').after(html);

    });
}

//===========================//