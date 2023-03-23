ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [51.526418, 45.998692],
            zoom: 17,
            controls: ['zoomControl']
        }, {
            searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            balloonContent: 'Это красивая метка'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: './media/markerMapInvers.png',
            // Размеры метки.
            iconImageSize: [28, 44],

            iconContentLayout: MyIconContentLayout
        });

    myMap.geoObjects
        .add(myPlacemark);
});