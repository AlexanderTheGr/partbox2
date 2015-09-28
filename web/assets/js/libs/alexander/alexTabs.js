(function($) {
    $.fn.alexTabs = function(app, ctrl, url, custom) {
        var alexander = this;
        alexander.hide();
        var defaults = {}
        var $dialog = {}
        var settings = $.extend({}, defaults, custom);
        tabs(app, ctrl, url);
        function tabs(app, ctrl, url) {
            var app = angular.module(app, ['ngSanitize']).config(function($interpolateProvider) {
                $interpolateProvider.startSymbol('[[').endSymbol(']]');
            });
            var data = {};
            data.id = 1;
            app.controller(ctrl, function($scope, $http, $sce) {
                $http.get(url, "options=nodata")
                        .success(function(response) {
                    //$scope.records = response.data;
                    $scope.tabs = response.tabs;
                    alexander.show();
                    $scope.deliberatelyTrustDangerousSnippet = function(html) {
                        $scope.snippet = html;
                        return $sce.trustAsHtml($scope.snippet);
                    };
                });

            });
        }
    }
})(jQuery);
