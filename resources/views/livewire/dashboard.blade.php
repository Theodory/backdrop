<div>
    <select class="js-example-basic-single" name="state">
        <option value="AL">Alabama</option>
        <option value="WY">Wyoming</option>
      </select>
    <div id="chart-container"></div>
    <script>
        document.addEventListener('livewire:load', function () {
            var country = @this.country;
            var data = JSON.parse(@this.countryRecord);
            var dataRecords = [];

            for(record in data){
                // console.log(data[record]);
                dataRecords.push({
                    label: data[record][0],
                    value: data[record][1]
                });
            }

            const dataSource = {
            chart: {
                caption: country + " Expectancy Rate [1990-2020]",
                xaxisname: "Years",
                yaxisname: "Expectancy Rate",
                theme: "fusion"
            },
            data: dataRecords
            };

            FusionCharts.ready(function() {
            var myChart = new FusionCharts({
                type: "column2d",
                renderAt: "chart-container",
                width: "100%",
                height: "100%",
                dataFormat: "json",
                dataSource
            }).render();
            });
        })
    </script>
</div>
