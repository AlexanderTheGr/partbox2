(function($) {
    $.fn.alexander = function(app,ctrl, url, custom) {
        var defaults = {}
        var alexander = this;
        var $dialog = {}
        var settings = $.extend({}, defaults, custom);
        dataTable(app,ctrl, url);
        function dataTable(app, ctrl, url) {
            var app = angular.module(app, ['datatables']).config(function($interpolateProvider) {
                $interpolateProvider.startSymbol('[[').endSymbol(']]');
            });
            var data = {};
            data.id = 1;
            app.controller(ctrl, function($scope, $http) {
                $http.get(url, "options=nodata")
                        .success(function(response) {
                    //$scope.records = response.data;
                    $scope.fields = response.fields;
                    setTimeout(function() {
                        var table = $(alexander).dataTable({
                            "pageLength": 100,
                            "processing": true,
                            "serverSide": true,
                            "drawCallback": function(settings) {
                                $(alexander).find('tbody').on('click', 'tr', function() {
                 
                                    if ($(this).hasClass('selected')) {
                                        $(this).removeClass('selected');
                                    }
                                    else {
                                        table.$('tr.selected').removeClass('selected');
                                        $(this).addClass('selected');
                                    }
                                });

                            },
                            "rowCallback": function(nRow, aData, iDataIndex) {

                            },
                            "createdRow": function(nRow, aData, iDataIndex) {
                                $(nRow).attr('ref', aData[0]);
                                $(nRow).attr('ng-click', "toggle()");
                            },
                            "ajax": {
                                "method": "post",
                                "url": url,
                            }
                        })
                    }, 1)
                });
            });
        }}
})(jQuery);