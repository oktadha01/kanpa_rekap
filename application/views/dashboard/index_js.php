<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://rendro.github.io/easy-pie-chart/javascripts/jquery.easy-pie-chart.js"></script>

<script>
    $(function() {
        var $minWidth = 900;
        if ($(this).width() < $minWidth) {
            alert('ya');
            var size_chart = 100
            var line_chart = 10
        } else {
            var line_chart = 15
            var size_chart = 150
            
        }
        $('.chart').easyPieChart({
            scaleColor: "transparent",
            lineWidth: line_chart,
            lineCap: 'circle', //Can be butt
            barColor: '#009CEF',
            trackColor: "#e2354666",
            size: size_chart,
            rotate: 0,
            animate: 1000,

            // onStep: function(value) {
            //     this.$el.find('span').text(value);
            // },
            // onStop: function(value, to) {
            //     this.$el.find('span').text(to);
            // }

        });

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    });
</script>