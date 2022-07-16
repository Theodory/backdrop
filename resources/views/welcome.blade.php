<!DOCTYPE html>
<html lang="en" >

<head>
    <title>{{config('app.name') ?? 'Smart Tech Inc.'}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>

        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #edf2f7;
            background-color: #edf2f7;
        }

        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
        }
    </style>


</head>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
   @include('components.nav-link')

    <!--Container-->
    <div class="container  w-4/5 mt-4  mx-auto px-2">

        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            <div class="my-4 flex justify-between">
                <div></div>
                <a href="{{route('import')}}" class="inline-flex bg-red-900 px-2 py-1 text-[#fff] self-end">
                    <svg class="w-6 h-6 fill-current mr-2" stroke-width="1.5" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                    Import CSV
                </a>
            </div>


            <table id="countryData"   style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Country Name</th>
                        <th data-priority="2">Country Code</th>
                        <th data-priority="3">Average Expectancy Rate</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
         'use strict';
      let url = <?php echo json_encode(route('home')) ?>;
    </script>
    <script>
        $(document).ready(function() {
            $('#countryData').DataTable({
                responsive:true,
            processing: true,
            serverSide: true,
            'searching': true,
            destroy: true,
            ajax: {url: url},
            columns: [
                {data: 'name', name: 'name'},
                {data: 'code', name: 'code'},
                {data: 'age', name: 'age'},
            ],
            columnDefs: [
                {
                searchable: false,
                'targets': 2
                }
            ],
            'aaSorting': [
                [0, 'asc']
            ],
            'lengthMenu': [[10, 50, 100, 200, 300, -1], [10, 50, 100, 200, 300, 'All']]
            })
            .columns.adjust()
            .responsive.recalc();;
        });
    </script>

</body>

</html>