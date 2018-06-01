/**
 * Initial when document ready
 */
$(document).ready(function () {
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        maxViewMode: 2
    });

    $('.birthday-datepicker').datepicker({
        autoclose: true,
        endDate: '0d',
        format: 'yyyy-mm-dd',
        maxViewMode: 2
    });

    $('.datetimepicker').datetimepicker({
        useCurrent: false,
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
    });

    $('input.check-related-field-on-change').change(function () {
        correctStatusOfrelatedField(this);
    });
    correctAllStatusOfRelatedField($('input.check-related-field-on-change:checked'));

    $('.summernote').summernote({
        height: 350,
        minHeight: null,
        maxHeight: null,
        focus: false
    });

    $('.summernote-short').summernote({
        height: 200,
        minHeight: null,
        maxHeight: null,
        focus: false
    });

    $('.simple-dropdown').multiselect({
        buttonClass: 'btn btn-default',
        buttonWidth: 'auto',
        buttonContainer: '<div class="btn-group" />',
        maxHeight: false
    });
});

/**
 * Logout function
 */
function logout(event) {
    event.preventDefault();
    $('#logout-form').submit();
}

/**
 * Delete item from table
 */
function deleteItem(event, element, message) {
    event.preventDefault();
    bootbox.confirm({
        message: message,
        closeButton: false,
        buttons: {
            confirm: {
                label: 'Có',
                className: 'btn-danger'
            },
            cancel: {
                label: 'Không',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if (result) {
                $(element).parent('form').submit();
            }
        }
    })
}

/**
 * Correct status of related field
 * 1   : Remove required, add disables and set value = ''
 * != 1: Remove disabled, add required
 */
function correctStatusOfrelatedField(element) {
    var $related_field = $(element).closest('form').find('input[name="' + $(element).data('related-field') + '"]').first();
    if (!$related_field)return;
    $related_field.prop('disabled', element.value == '1');
    $related_field.prop('required', element.value != '1');
    if (element.value == '1') $related_field.val('');
}

function correctAllStatusOfRelatedField(element) {
    var nodes = $(element).get();
    for (var i in nodes) {
        correctStatusOfrelatedField(nodes[i]);
    }
}

/**
 * Common Multiselect
 */
function addMultiselect(element, objectText) {
    $(element).multiselect({
        buttonClass: 'btn btn-default',
        buttonWidth: 'auto',
        buttonContainer: '<div class="btn-group" />',
        maxHeight: false,
        buttonText: function (options, select) {
            if (options.length === 0) {
                return 'Chọn ' + objectText + ' ...';
            }
            else if (options.length > 1) {
                return 'Đã chọn (' + options.length + ') ' + objectText;
            }
            else {
                var labels = [];
                options.each(function () {
                    if ($(this).attr('label') !== undefined) {
                        labels.push($(this).attr('label'));
                    }
                    else {
                        labels.push($(this).html());
                    }
                });
                return labels.join(', ') + '';
            }
        }
    });
}