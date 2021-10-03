<x-app-layout>

    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Datatable</h3>
                        <p class="text-sm mb-0">
                            This is an exmaple of datatable using the well known datatables.net plugin. This is a
                            minimal setup in order to get started fast.
                        </p>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Project</th>
                                <th scope="col" class="sort" data-sort="budget">Budget</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col">Users</th>
                                <th scope="col" class="sort" data-sort="completion">Completion</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <tr>
                                <td scope="row">
asdf
                                </td>
                                <td class="budget">
                                    $2500 USD
                                </td>
                                <td>
                                    asf
                                </td>
                                <td>
                                    asdf
                                </td>
                                <td>
                                    asdf
                                </td>
                                <td class="text-right">
                                    asf
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

<x-slot name="scripts">
    <script type="application/javascript">
        $(document).ready(function() {
            $('#datatable-basic').DataTable();
        });
    </script>
</x-slot>

</x-app-layout>
