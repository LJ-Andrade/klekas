$('.btnClose').click(function(){
    // $(this).parent().addClass('Hidden');
    $(this).parent().hide();
});

var searchFilters = $('#SearchFilters');
searchFilters.hide();

$('#SearchFiltersBtn').on('click', function(){
    searchFilters.toggle(100);
});

$(window).scroll(function (event) {
    let scroll = $(window).scrollTop();
    if (scroll > 80) {
        $('.fixed-if-scroll').addClass('true');
        $('.fixed-if-scroll').removeClass('false');
    }
    else {
        $('.fixed-if-scroll').removeClass('true');
        $('.fixed-if-scroll').addClass('false');
    }
});

// Prevent ENTER key on forms
// $(document).ready(function() {
//     $(window).keydown(function(event){
//         if(event.keyCode == 13) {
//         event.preventDefault();
//             return false;
//         }
//     });
// });

// Remap Enter as Tab Key

$(document).ready(function() {
    if(!allowEnterOnForms)
    {
        $(document).keydown(function(e) {

            // Set self as the current item in focus
            var self = $(':focus'),
                // Set the form by the current item in focus
                form = self.parents('form:eq(0)'),
                focusable;
        
            // Array of Indexable/Tab-able items
            focusable = form.find('input,a,select,button,textarea').filter(':visible');
        
            function enterKey(){
            if (e.which === 13 && !self.is('textarea')) { // [Enter] key
        
                // If not a regular hyperlink/button/textarea
                if ($.inArray(self, focusable) && (!self.is('a')) && (!self.is('button'))){
                // Then prevent the default [Enter] key behaviour from submitting the form
                e.preventDefault();
                } // Otherwise follow the link/button as by design, or put new line in textarea
        
                // Focus on the next item (either previous or next depending on shift)
                focusable.eq(focusable.index(self) + (e.shiftKey ? -1 : 1)).focus();
        
                return false;
            }
            }
            // We need to capture the [Shift] key and check the [Enter] key either way.
            if (e.shiftKey) { enterKey() } else { enterKey() }
        });
    }
    else
    {
        console.log("Enter Key on Forms Enabled");
    }
});