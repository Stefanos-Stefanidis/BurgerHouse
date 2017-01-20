$(document).ready(function(){



    $('.productLine').on('click', function (e) {
        //$(this).addClass("line-through");
/*        $( ".productLine h4" ).each(function() {
        if ($( ".productLine h4 " ).hasClass( "line-through" )) {
            $(this).removeClass("line-through");

        }else{

            $(this).addClass("line-through");
        }
        });*/
        //$(this).addClass("line-through");
            
        
    });
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'fa fa-check'
                },
                off: {
                    icon: 'fa fa-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {

            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            $(this).addClass("line-through");

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-success active');

            }
            else {
                $button
                    .removeClass('btn-success active')
                    .addClass('btn-default');

            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});