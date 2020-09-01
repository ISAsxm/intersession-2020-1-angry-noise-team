<table class="table">
    <thead>
    <tr>
        <th scope="col">Ficher</th>
        <th scope="col">Erreur</th>
    </tr>
    </thead>

    <tbody>
    @foreach($report->getIndividualReports() as $individualReport)
        @foreach($individualReport->getReportData() as $reportData)
            @foreach($reportData as $file)
                <tr>
                    <td>{{ $file['file'] }}</td>
                    <td>
                        @foreach($file['errors'] as $error)
                            <p>{{ $error['name'] }}</p>
                            <p>{{ $error['description'] }}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        @endforeach
    @endforeach
    </tbody>
</table>

