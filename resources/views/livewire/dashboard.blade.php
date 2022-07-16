<div>
    <select class="" id="dropdown" wire:model.defer="country">
        @foreach ($countries as $item)
            <option value="{{ $item ?? '' }}" @if ($country === $item) selected @endif>{{ $item ?? '' }}
            </option>
        @endforeach
    </select>

    <div id="chart-container"></div>
    <script>
        document.addEventListener('livewire:load', function() {

            var country = @this.country;
            var data = JSON.parse(@this.countryRecord);
            var dataRecords = [];

            $('#dropdown').select2({
                dropdownAutoWidth: true,
                width: '100%'
            });

            drawReport();

            function drawReport() {
                for (record in data) {
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
            }



            $('#dropdown').on('change', function(e) {
                var data = $('#dropdown').select2("val");
                Livewire.emit('updateReport')
            });

            document.addEventListener('livewire:update', function() {
                country = @this.country;
                data = JSON.parse(@this.countryRecord);
                dataRecords = [];
                drawReport();
            })

        });
    </script>
</div>
