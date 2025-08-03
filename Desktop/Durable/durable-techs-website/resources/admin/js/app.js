import jQuery from 'jquery';
window.$ = jQuery;
import $ from 'jquery';
import 'flowbite';
import '@fortawesome/fontawesome-free/css/all.min.css';

$(document).ready(function() {
    var Message = $('.message');
    if (Message.length) {
        setTimeout(function() {
            Message.fadeOut(500, function() {
                $(this).remove();
            });
        }, 4000);

        $('.close-button').click(function() {
            Message.fadeOut(500, function() {
                $(this).remove();
            });
        });
    }
});
