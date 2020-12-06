$(function() {
    $('.datepicker.checkin input').Zebra_DatePicker({
        format: 'd M Y',
        container: $(".datepicker.checkin"),
        months: 	['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        days: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        show_select_today: 'Сегодня',
        lang_clear_date: 'Очистить',
        default_position: 'above',
        direction: false,
        onOpen: function(){
            let el = $(this).parents('.datepicker').children('.Zebra_DatePicker');
            $(el).css('left', '50%');
            $(el).css('bottom', '100%');
            $(el).css('top', 'auto');
        }
    });
  
});