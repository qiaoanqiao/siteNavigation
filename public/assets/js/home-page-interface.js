var cards = '';
var options = '';
var recommended_cards = '';
$.ajax({
    type: "GET",
    url: "http://navigation.test/api/page-data/home",
    data: '',
    dataType: "json",
    async: false,
    success: function (allData) {
        data = allData.data;
    }
});
new Vue({
    el: '#app',
    data: {
        options: data.optionData,
        links: data.linkData,
        categorys: data.categoryDataTree,
        categorysnx: data.categoryData,
    },
    methods: {
        cardJump: function (url) {
            if(url == '#' && url == '' && url == null) {
                window.open(url, '_blank');
            }

        },
    }
});
//
// Vue.component('category-list', {
//     name: 'category-list-father',
//     props: ['categorys-tree'],
//     template: '<li v-for="category in categorys-tree">\n' +
//         '                        <a v-bind:href="\'#\' + category.udid" class="smooth">\n' +
//         '                            <i class="linecons-doc"></i>\n' +
//         '                            <span class="title">{{category.title}}</span>\n' +
//         '                        </a>\n' +
//         '\n' +
//         '                    </li>'
// });
//
// Vue.component('category-list-children', {
//     name: 'category-list-children',
//     props: ['categorys-children'],
//     template: '<li v-for="category in categorys">\n' +
//         '                        <a v-bind:href="\'#\' + category.udid" class="smooth">\n' +
//         '                            <i class="linecons-doc"></i>\n' +
//         '                            <span class="title">{{category.title}}</span>\n' +
//         '                        </a>\n' +
//         '\n' +
//         '                    </li>'
// });

