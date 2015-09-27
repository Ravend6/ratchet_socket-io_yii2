(function () {
    'use strict';

    var posts = [
        {title: 'First Post', body: 'Lorem ispum1.', isVisible: true},
        {title: 'Second Post', body: 'Lorem ispum2.', isVisible: true},
        {title: 'Third Post', body: 'Lorem ispum3.', isVisible: false},

    ];
    
    Handlebars.registerHelper("inc", function(value, options) {
        return parseInt(value) + 1;
    });

    var itemTemplate = $('#post-item-template').html();
    Handlebars.registerPartial('post-item', itemTemplate);

    var template = Handlebars.compile( $('#template').html() );
    $('.posts').append( template(posts) );

    var template2 = Handlebars.compile( $('#template2').html() );
    $('.two-col').append(template2({name: '<em>Ravend</em>'}));

}());

