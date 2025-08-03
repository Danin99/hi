
$(document).ready(function() {
    $(document).on('click', '[data-dropdown-toggle]', function(event) {
        event.stopPropagation();
        var dropdownMenu = $(this).next('.dropdown-menu');
        $('.dropdown-menu').not(dropdownMenu).addClass('hidden');

        dropdownMenu.toggleClass('hidden');
    });

    $(document).on('click', function(event) {
        $('.dropdown-menu').each(function() {
            if (!$(this).hasClass('hidden') && !$(this).is(event.target) && $(this).has(event.target).length === 0) {
                $(this).addClass('hidden');
            }
        });
    });

});

function myModal(modalId, option, backdrop) {
    const $targetEl = document.getElementById(modalId);

    const options = {
        placement: 'bottom-right',
        backdrop: backdrop,
        backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
        closable: true,
    };

    const instanceOptions = {
        id: modalId,
        override: true
    };

    const modal = new Modal($targetEl, options, instanceOptions);
    if (option) {
        modal.hide();
    } else {
        modal.show();
    }
}
